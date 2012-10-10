<?php 
 
   class Shop extends CI_Controller 
   {
	   
	    function __construct()
		{
			  parent::__construct(); 
		}
		
	   
	      function index()
		  {
			    $this->load->model('shop_model'); 
				 $data['products']=$this->shop_model->get_all(); 
				 $this->load->view('shop_view',$data); 
		  }
		  
		  
		  function add()
		  {
			
			   $this->load->model('shop_model'); 
			   $result=$this->shop_model->get($this->input->post('id')); 
			
			    
				 $insert=array('id'=>$result->id,
				 'qty'=>'1',
				 'name'=>$result->name,
				 'price'=>$result->price
				 ); 
				 if(isset($result->option_name)) 
				 {
					   $insert['options']=array($result->option_name=>$result->option_values[$this->input->post($result->option_name)]);
				 
				 }
				 
				$this->cart->insert($insert);
				redirect('shopping/shop');
				
				
			      
		  }
		  function remove()
		  {
			   $insert=array('rowid'=>$this->uri->segment(4),
			   'qty'=>'0'
			   ); 
			   $this->cart->update($insert); 
			   redirect('shopping/shop');
		  }
		  function delete_all()
		  {
			    $this->cart->destroy(); 
				redirect('shopping/shop'); 
		  }
		  
		    
   }
   ?>
   