<div class="searchForm">
<?php
$data = $this->Js->get('#'.$modelName.'Usermgmt')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#'.$modelName.'Usermgmt')->event(
	  'submit',
	  $this->Js->request(
		array('action' => $this->request->action),
		array(
				'update' => '#'.$options['updateDivId'],
				'data' => $data,
				'async' => true,
				'dataExpression'=>true,
				'method' => 'POST'
			)
		)
	);
?>
<?php
	echo $this->Form->create(false, array('url' => '/'.$this->request->url, 'id' => $modelName.'Usermgmt','default' => false));
	if (isset($options['legend'])) {
		echo "<div class='searchTitle'><h2>".$options['legend']."</h2></div>";
	}
	echo $this->Form->input('Usermgmt.searchFormId', array('type' => 'hidden', 'value' => $modelName));

	if (isset($viewSearchParams)) {
		$jq = "<script type='text/javascript'>";
		foreach ($viewSearchParams as $field) {
			$search_options= $field['options'];
			$search_level = $search_options['label'];
			$search_options['label'] = false;
			$search_options['div'] = false;
			$search_options['autoComplete'] = "off";
			$search_options['class'] = "form-control input-sm";
			$search_options['required'] = false;
			if($search_options['type']=='text') {
				//$search_options['onBlur'] = "javascript:submitSearchForm('".$modelName."Usermgmt')";
			}
			echo "<div style='display:inline-block' class='col-sm-3 col-xs-12 search-frm-topspc'>";
			echo "<div>".$this->Form->label(__($search_level))."</div>";
			echo "<div>".$this->Form->input($field['name'], $search_options)."</div>";
			echo "<div style='clear:both'></div>";
			echo "</div>";
			if($search_options['type']=="text") {
				$parts = array_values(Set::filter(explode('.', $field['name']), true));
				$fieldModel = $modelName;
				$fieldName = $search_options['field'];
				if(isset($parts[1])) {
					$fieldModel = $parts[0];
					$fieldName = $parts[1];
				}
				$fieldId = $fieldModel.Inflector::camelize($fieldName);
				$url = SITE_URL."usermgmt/autocomplete/fetch/".$fieldModel."/".$fieldName;
				$jq .=  "$(function() {
							var cache = {},
								lastXhr;
							$('#".$fieldId."').autocomplete({
								minLength: 2,
								source: function( request, response ) {
									var term = request.term;
									if ( term in cache ) {
										response( cache[ term ] );
										return;
									}
									lastXhr = $.getJSON( '".$url."', request, function( data, status, xhr ) {
										cache[ term ] = data;
										if ( xhr === lastXhr ) {
											response( data );
										}
									});
								}
							});
						});";
				/*$jq .= "$('#".$fieldId."').autocomplete('".$url."', {
							width: 200,
							delay:2,
							minChars:2,
							selectFirst: true,
							autoFocus: true,
							matchContains: false,
							cacheLength:10,
							multiple:false,
							mustMatch:false
						});";*/
			}
		}
		$jq .="</script>";
		echo $jq;
	}
	echo "<div class='search_submit col-sm-12'>".$this->Form->submit(__('Search'), array("class"=>"btn orange-btn", "div"=> false));
    echo $this->Html->link(__('Reset'), 
            array(
                "controller" => "common", 
                "action" => "resetFilter",
                Inflector::pluralize($modelName)
            ), 
            array("class"=>"btn orange-btn")
         )
        ."</div>";
	echo "<div style='clear:both'></div>";
	echo $this->Form->end();
	echo $this->Js->writeBuffer();
?>
</div>