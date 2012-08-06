<?php 
//include('class.php');
class Term_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();		
    }
	
	//List Categories
	function get($id=0,$limit=-1,$offset=10,$taxonomy='category'){		
		if($id == 0){
			$this->db->select('ci_terms.term_id,name,slug,description,parent');
			if($limit > 0){
				$this->db->limit($limit,$offset);
			}
			$this->db->from('ci_terms');
			$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
			$this->db->where('taxonomy',$taxonomy);
			$query = $this->db->get();
			return $query->result();
		}elseif($id > 0){
			$this->db->select('ci_terms.term_id,name,slug,description,parent');
			$this->db->from('ci_terms');
			$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
			$this->db->where('ci_terms.term_id',$id);
			$this->db->where('taxonomy',$taxonomy);
			$query = $this->db->get();
			$data = array();
			$data = $query->row_array();
			return $data;	
		}
	}					
	//Add Term
	function add($name,$slug,$taxonomy,$description,$parent)
	{
		//Add Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,				
				);
		$Q = $this-> db-> insert('ci_terms', $cat);
		
		//Add Term Taxonomy
		$query = $this->db->get('ci_terms');			
		$last_row = $query->last_row('array');
		
		$termTaxonomy = array(
			'term_id' => $last_row['term_id'],
			'taxonomy ' => $taxonomy,
			'description' => $description,
			'parent' =>$parent
		);
		$this->db->insert('ci_term_taxonomy',$termTaxonomy);					
	}
	
	//Delete Category
	function delete($term_id)
	{
		if($term_id != 1){
			//update post to category 1
			$taxonomy_id = $this->get_taxonomy_by_term($term_id);
			$this->db->where('term_taxonomy_id',$taxonomy_id);
			$this->db->update('ci_term_relationships',array('term_taxonomy_id'=>$taxonomy_id));			
			//Delete Category
			$this->db->delete('ci_term_taxonomy',array('term_id'=>$term_id));
			$this->db->delete('ci_terms',array('term_id'=>$term_id));						
		}
	}
	//get term_taxonomy_by_term_id
	function get_taxonomy_by_term($term_id){
		$query = $this->db->get_where('ci_term_taxonomy',array('term_id' => $term_id));
		$row = $query->first_row();
		return $row->term_taxonomy_id;
	}
	
	function update($term_id,$name,$slug,$description,$parent)
	{
		//Update Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,				
				);
		$this-> db-> where('term_id', $term_id);
		$this-> db-> update('ci_terms', $cat);

		//Update Term Taxonomy
		$termTaxonomy = array(			
			
			'description' => $description,
			'parent' =>$parent
		);
		$this-> db-> where('term_id', $term_id);
		$this-> db-> update('ci_term_taxonomy', $termTaxonomy);
	}
	function add_term_relationship($object_id,$term_id){
		$arrcat = array(
			'object_id'=>$object_id,
			'term_taxonomy_id'=>$term_id
		);
		$this->db->insert('ci_term_relationships',$arrcat);	
	}
}
?>