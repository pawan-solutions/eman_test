<table class="table">
  <tbody>
        <?php if(!empty($result)){ 
          $cmp_type_h = isset($result['CompanyHistory']['company_type'])?$result['CompanyHistory']['company_type']:'';
          ?>
        <tr>
            <td><b>Updated By</b></td>
            <td>:</td>
            <td><?php $created_by = $result['CompanyHistory']['created_by'];
            $created_by_info2 = $this->Custom->user_info_by_id($created_by);
            if(!empty($created_by_info2)){ ?>
            <a target="_blank" href="<?php echo SITE_URL?>UserActivity/view_employee/<?php echo $created_by?>">
            <?php echo ucfirst($created_by_info2['User']['first_name'])." ".$created_by_info2['User']['last_name']; }
           ?></a></td>
        </tr>
        
        <tr>
            <td><b>Updated Date</b></td>
            <td>:</td>
            <td><?php echo date("d M Y H:i:s",strtotime($result['CompanyHistory']['created']))?></td>
        </tr>


        <tr>
            <td>Company Name</td>
            <td>:</td>
            <td><?php echo $result['CompanyHistory']['company_name']?></td>
        </tr>

        <tr>
            <td>Company Type</td>
            <td>:</td>
            <td><?php echo isset($company_type[$cmp_type_h])?$company_type[$cmp_type_h]:''; ?></td>
        </tr>

        <tr>
            <td>Company Email</td>
            <td>:</td>
            <td><?php echo $result['CompanyHistory']['company_email']?></td>
        </tr>

        <tr>
            <td>Telephone Number</td>
            <td>:</td>
            <td><?php echo $result['CompanyHistory']['company_phone']?></td>
        </tr>

        <tr>
            <td>Company Representative</td>
            <td>:</td>
            <td><?php echo $result['CompanyHistory']['representative_name']?></td>
        </tr>

        <tr>
            <td>Representative Mobile Number</td>
            <td>:</td>
            <td><?php echo $result['CompanyHistory']['representative_mobile']?></td>
        </tr>

        <tr>
            <td>Remark</td>
            <td>:</td>
            <td><?php echo $result['CompanyHistory']['remark']?></td>
        </tr>
      <?php } ?>  

  </tbody>
</table>