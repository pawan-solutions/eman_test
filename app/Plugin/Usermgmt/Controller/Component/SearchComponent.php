<?php
App::import('Component', 'Session');
App::import('Behavior', 'Usermgmt.Searching');

class SearchComponent extends Component {
	var $components = array('Session');
	var $settings = array();
	var $nopersist = array();
	var $formData = array();
	var $_request_settings = array();
  

   
	public function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
		$this->_request_settings = $settings;
	}

	function initialize(Controller $controller) {
		if (!isset($controller->searchFields)) {
			return;
		}
		$this->__updatePersistence($controller, $this->_request_settings);
		$this->settings[$controller->name] = $controller->searchFields;

		if (!isset($this->settings[$controller->name][$controller->action])) {
			return;
		}
		$settings = $this->settings[$controller->name][$controller->action];
		foreach ($settings as $model => $search) {
			if (!isset($controller->{$model})) {
				trigger_error(__('Search model not found: %s', $model));
				continue;
			}
			$controller->$model->Behaviors->attach('Usermgmt.Searching', $search);
		}
	}

	function startup(Controller $controller) {
		if (!isset($this->settings[$controller->name][$controller->action])) {
			return;
		}
		$settings = $this->settings[$controller->name][$controller->action];
		if (!in_array('Usermgmt.Search', $controller->helpers)) {
			$controller->helpers[] = 'Usermgmt.Search';
		}
		$sessionKey = sprintf('UserAuth.Search.%s.%s', $controller->name, $controller->action);
		if (!$controller->request->is('post') || !isset($controller->request->data['Usermgmt']['searchFormId'])) {
			$persistedData = array();
			if ($this->Session->check($sessionKey)) {
				$persistedData = $this->Session->read($sessionKey);
			}
			if (empty($persistedData)) {
				return;
			}
			$this->formData = $persistedData;
		}
		else {
			$this->formData = $controller->request->data;
			$this->Session->write($sessionKey, $this->formData);
			//$controller->redirect($controller->referer());
		}
		foreach ($settings as $model => $options) {
			if (!isset($controller->{$model})) {
				trigger_error(__('Search model not found: %s', $model));
				continue;
			}
			$controller->$model->setSearchValues($this->formData);
		}
	}
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @param object $c current controller object
	 * @return void
	 */
	function beforeFilter(Controller $controller) {
		 parent::beforeFilter();
    $this->User = ClassRegistry::init('AppUser');
    $this->set('model', 'AppUser');
		$controller->Security->csrfCheck = false;
		$controller->Security->validatePost = false;
	}
	function beforeRender(Controller $controller){
		if (!isset($this->settings[$controller->name][$controller->action])) {
			return;
		}
		$models = $this->settings[$controller->name][$controller->action];
		$viewSearchParams = array();

		foreach ($models as $model => $fields) {
			if (!isset($controller->$model)) {
				trigger_error(__('Search model not found: %s', $model));
				continue;
			}
			foreach ($fields as $field => $settings) {
				if (!is_array($settings)) {
					$field = $settings;
					$settings = array();
				}
				if (!isset($settings['type'])) {
					$settings['type'] = 'text';
				}
				$options = array();
				$fieldName = $field;
				$fieldModel = $model;
				if (strpos($field, '.') !== false) {
					list($fieldModel, $fieldName) = explode('.', $field);
				}
				if (!empty($this->formData)) {
					if (isset($this->formData[$fieldModel][$fieldName])) {
						$options['value'] = $this->formData[$fieldModel][$fieldName];
					}
				}
				if (isset($settings['inputOptions'])) {
					if (!is_array($settings['inputOptions'])) {
						$settings['inputOptions'] = array($settings['inputOptions']);
					}
					$options = array_merge($options, $settings['inputOptions']);
				}
				if (isset($settings['label'])) {
					$options['label'] = $settings['label'];
				}
				switch ($settings['type']) {
					case 'text':
						$options['type'] = 'text';
						break;
					case 'select':
						$options['type'] = 'select';
						$selectOptions = array();
						if (isset($settings['model'])) {
							$modelName = $settings['model'];
						} else {
							$modelName = $fieldModel;
						}
						$workingModel = ClassRegistry::init($modelName);
						if (isset($settings['selectOptions'])) {
							$selectOptions = $settings['selectOptions'];
						}
						if (isset($settings['selector'])) {
							if (!method_exists($workingModel, $settings['selector'])) {
								trigger_error(__('Selector method "%s" not found in model "%s" for field "%s"!', $settings['selector'], $fieldModel, $fieldName));
								return;
							}
							$selectorName = $settings['selector'];
							$options['options'] = $workingModel->$selectorName($selectOptions);
						} else if (isset($settings['options'])) {
							$options['options'] = $settings['options'];
						} else {
							$options['options'] = $workingModel->find('list', array_merge($selectOptions, array('nosearch' => true)));
						}
						break;
					case 'checkbox':
						$options['type'] = 'checkbox';
						if (isset($options['value'])) {
							$options['checked'] = !!$options['value'];
							unset($options['value']);
						} else if (isset($settings['default'])) {
							$options['checked'] = !!$settings['default'];
						}
						break;
					default:
						continue;
				}
				// if no value has been set, show the default one
				if (!isset($options['value']) && isset($settings['default']) && $options['type'] != 'checkbox') {
					$options['value'] = $settings['default'];
				}
				$options['field']=$fieldName;
				$viewSearchParams[] = array('name' => sprintf('%s.%s', $fieldModel, $fieldName), 'options' => $options);
			}
		}
		$controller->set('viewSearchParams', $viewSearchParams);
	}

	function __updatePersistence(Controller $controller, $settings) {
		if ($this->Session->check('UserAuth.NoPersist')) {
			$this->nopersist = $this->Session->read('UserAuth.NoPersist');
		}
		if (isset($settings['nopersist'])) {
			$this->nopersist[$controller->name] = $settings['nopersist'];
			$this->Session->write('UserAuth.NoPersist', $this->nopersist);
		} else if (isset($this->nopersist[$controller->name])) {
			unset($this->nopersist[$controller->name]);
			$this->Session->write('UserAuth.NoPersist', $this->nopersist);
		}
		if (!empty($this->nopersist)) {
			foreach ($this->nopersist as $nopersistController => $actions) {
				if (is_string($actions)) {
					$actions = array($actions);
				} else if (is_bool($actions) && $actions == true) {
					$actions = array();
				}
				if (empty($actions) && $controller->name != $nopersistController) {
					if ($this->Session->check(sprintf('UserAuth.Search.%s', $nopersistController))) {
						$this->Session->delete(sprintf('UserAuth.Search.%s', $nopersistController));
						continue;
					}
				}
				foreach ($actions as $action) {
					if ($controller->name == $nopersistController && $action == $controller->action) {
						continue;
					}
					if ($this->Session->check(sprintf('UserAuth.Search.%s.%s', $nopersistController, $action))) {
						$this->Session->delete(sprintf('UserAuth.Search.%s.%s', $nopersistController, $action));
					}
				}
			}
		}
	}
}