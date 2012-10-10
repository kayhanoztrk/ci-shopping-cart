<?php
 
  
    class Shop_Model extends CI_Model 
	{
		 
		  function get_all()
		  {
			
			 $results=$this->db->get('products')->result(); 
			    
				foreach($results as &$result)
				{
					  if($result->option_name)
					  {
						    $result->option_values=explode(',',$result->option_values); 
					  }
				}
				return $results; 
				
			    
		  }
		  function get($id)
		  {
			    $this->db->where('id',$id); 
				$results=$this->db->get('products')->result();
				 $result=$results[0];
				 if($result->option_name)
				 {
					   $result->option_values=explode(',',$result->option_values);  
				 }
			  
			    return $result;	
		  }
	
	}
	?>
	