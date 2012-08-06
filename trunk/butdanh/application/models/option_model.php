<?php
	class Option_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		function getOption($option_name,$blog_id=0)
		{
			$this->db->select('option_id,option_name,option_value');
			$this->db->from('ci_options');			
			$this->db->where('option_name',$option_name);
			if($blog_id != 0){
				$this->db->where('blog_id',$blog_id);
			}
			$query  = $this->db->get();
			foreach($query->result() as $row){
				return $row->option_value;	
			}
			return '';
		}
		public function update($blog_id,$option_name,$option_value){
			$this->db->from('ci_options');
			$this->db->where('blog_id',$blog_id);
			$this->db->where('option_name',$option_name);
			if($this->db->count_all_results() > 0){
				$data=array(
					'option_value'=>$option_value
				);
				$this->db->where('blog_id',$blog_id);
				$this->db->where('option_name',$option_name);
				$this->db->update('ci_options',$data);		
			}else{
				$this->add($blog_id,$option_name,$option_value);		
			}
		}
		public function add($blog_id,$option_name,$option_value){
			$array_add = array(
				'blog_id'=>$blog_id,
				'option_name'=>$option_name,
				'option_value'=>$option_value				
			);	
			$this->db->insert('ci_options',$array_add);
		}
	}
?>