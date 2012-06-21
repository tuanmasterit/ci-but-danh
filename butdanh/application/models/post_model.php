<?php 
//include('class.php');
class Post_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();		
    }
	//Add posts
	function add($post_author,$post_date,$post_content,$post_title,$post_excerpt,$post_type,$featured_image,$arr_category){
		/*$post = new Posts();		
		$post->$post_author = $post_author;
		$post->$post_date = $post_date;
		$post->$post_content = $post_content;
		$post->$post_title = $post_title;
		$post->$post_excerpt = $post_excerpt;
		$post->$guid = $guid;
		$post->$post_type = $post_type;*/
		$arr=array(
			'post_author'=>$post_author,
			'post_date'=>$post_date,
			'post_content'=>$post_content,
			'post_title'=>$post_title,
			'post_excerpt'=>$post_excerpt,			
			'post_type'=>$post_type	
		);
		$this->db->insert('ci_posts',$arr);
		$last_id = $this->get_id_last_row();
		//Insert featured image
		$arrmeta = array(
			'post_id'=>$last_id,
			'meta_key'=>'featured_image',
			'meta_value'=>$featured_image
		);
		$this->db->insert('ci_postmeta',$arrmeta);
		//Insert category		
		foreach($arr_category as $category){
			$query = $this->db->get_where('ci_term_taxonomy',array('term_id'=>$category));
			foreach ($query->result() as $row)
			{
				$term_taxonomy_id=$row->term_taxonomy_id;
			}
			$arrcat = array(
				'object_id'=>$last_id,
				'term_taxonomy_id'=>$term_taxonomy_id
			);
			$this->db->insert('ci_term_relationships',$arrcat);	
		}
		return $last_id;
	}
	//Update posts
	function update($id,$post_author,$post_modified,$post_content,$post_title,$post_excerpt,$featured_image,$arr_category){		
		$flag = true;
		$arr=array(
			'post_author'=>$post_author,
			'post_modified'=>$post_modified,
			'post_content'=>$post_content,
			'post_title'=>$post_title,
			'post_excerpt'=>$post_excerpt	
		);
		//update post
		$this->db->where('id',$id);
		if( !$this->db->update('ci_posts',$arr)){$flag=false;}
		//Update featured image
		//check exits featured image
		$query = $this->db->get_where('ci_postmeta',array('post_id'=>$id,'meta_value'=>'featured_image'));
		$result = $query->result();
		if(count($result) > 0){
			$arrmeta = array(
				'meta_value'=>$featured_image
			);
			$this->db->where('post_id',$id);
			$this->db->where('meta_key','featured_image');
		}else{
			//Insert featured image
			$arrmeta = array(
				'post_id'=>$id,
				'meta_key'=>'featured_image',
				'meta_value'=>$featured_image
			);
			$this->db->insert('ci_postmeta',$arrmeta);		
		}
		if(!$this->db->update('ci_postmeta',$arrmeta)){$flag=false;}
		//Update category
		if(!$this->db->query("DELETE FROM ci_term_relationships WHERE object_id=".$id." AND term_taxonomy_id IN(SELECT term_taxonomy_id FROM ci_term_taxonomy WHERE taxonomy='category')")){$flag=false;}		
		foreach($arr_category as $category){
			$query = $this->db->get_where('ci_term_taxonomy',array('term_id'=>$category));
			foreach ($query->result() as $row)
			{
				$term_taxonomy_id=$row->term_taxonomy_id;
			}
			$arrcat = array(
				'object_id'=>$id,
				'term_taxonomy_id'=>$term_taxonomy_id
			);
			$this->db->insert('ci_term_relationships',$arrcat);	
		}
		return $flag;
	}	
	//List Posts
	function list_posts($post_type, $limit, $offset){		
		$this->db->select('ci_posts.id,user_nicename,post_date,post_title,post_excerpt');
		$this->db->limit($limit,$offset);
		$this->db->from('ci_posts');
		$this->db->join('ci_users','post_author=ci_users.id');		
		$this->db->where('post_type',$post_type);
		$query = $this->db->get();
        return $query->result();
	}
	function get_post($id){		
		$this->db->select('ci_posts.id,post_author,user_nicename,post_date,post_title,post_excerpt,post_content');
		$this->db->from('ci_posts');
		$this->db->join('ci_users','post_author=ci_users.id');		
		$this->db->where('ci_posts.id',$id);
		$query = $this->db->get();
        return $query->result();
	}
	function get_featured_image($id){
		$this->db->select('meta_value');
		$this->db->from('ci_postmeta');
		$this->db->join('ci_posts','post_id=id');		
		$this->db->where('id',$id);
		$this->db->where('meta_key','featured_image');
		$query = $this->db->get();
		foreach($query->result() as $row){
			return $row->meta_value;	
		}
        return '';
	}
	//delete post
	function delete_post($id){
		$this->db->delete('ci_postmeta',array('post_id'=>$id));
		$this->db->delete('ci_term_relationships',array('object_id'=>$id));
		$this->db->delete('ci_posts',array('id'=>$id));
		$this->db->delete('ci_comments',array('comment_post_ID'=>$id));	
	}
	function get_categories_of_post($id){
		$this->db->select('term_taxonomy_id');
		$this->db->from('ci_term_relationships');
		$this->db->join('ci_posts','object_id=id');		
		$this->db->where('id',$id);
		$query = $this->db->get();
        return $query->result();		
	}
	//List Categories
	function list_categories($limit, $offset){		
		$this->db->select('ci_terms.term_id,name,slug,description');
		$this->db->limit($limit,$offset);
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
		$this->db->where('taxonomy','category');
		$query = $this->db->get();
        return $query->result();
	}
	//Get id last record
	function get_id_last_row(){
		$query = $this->db->get('ci_posts');			
		$last_row = $query->last_row();
		return $last_row->ID;
	}
	
	//Get Category ID
	function getCategory($id)
	{
		$data= array();
		$option = array('term_id'=>$id);
		$Q = $this->db->get_where('ci_terms',$option,1);
		if($Q->num_rows()>0)
			{
				$data = $Q->row_array();
			}			
		$Q->free_result();
		return $data;		
	}
	
	//Get Term Taxonomy
	function getTermTaxonomy($id)
	{
		$data= array();
		$option = array('term_id'=>$id);
		$Q = $this->db->get_where('ci_term_taxonomy',$option,1);
		if($Q->num_rows()>0)
			{
				$data = $Q->row_array();
			}			
		$Q->free_result();
		return $data;	
	}
	
	//Get Top Category Parent
	function getTopCategories(){
		$data[0] = 'Không có cha';		
		$Q = $this-> db-> get('ci_terms');
		if ($Q-> num_rows() > 0){
			foreach ($Q-> result_array() as $row){
				$data[$row['term_id']] = $row['name'];
			}
		}
		$Q-> free_result();
		return $data;
	}

	//Add Category
	function addCategory($name,$slug,$taxonomy,$description,$parent)
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
	function delete_term($id)
	{
		if($id != 1){
			//update post to category 1
			$taxonomy_id = get_taxonomy_by_term($id);
			$this->db->where('term_taxonomy_id',$taxonomy_id);
			$this->db->update('ci_term_relationships',array('term_taxonomy_id'=>$taxonomy_id));			
			//Delete Category
			$this->db->delete('ci_term_taxonomy',array('term_id'=>$id));
			$this->db->delete('ci_terms',array('term_id'=>$id));						
		}
	}
	//get term_taxonomy_by_term_id
	function get_taxonomy_by_term($term_id){
		$query = $this->db->get_where('ci_term_taxonomy',array('term_id' => $term_id));
		$row = $query->first_row();
		return $row->term_taxonomy_id;
	}
	
	function updateCategory($id,$name,$slug,$description,$parent)
	{
		//Update Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,				
				);
		$this-> db-> where('term_id', $id);
		$this-> db-> update('ci_terms', $cat);

		//Update Term Taxonomy
		$termTaxonomy = array(			
			
			'description' => $description,
			'parent' =>$parent
		);
		$this-> db-> where('term_id', $id);
		$this-> db-> update('ci_term_taxonomy', $termTaxonomy);
	}
}
?>