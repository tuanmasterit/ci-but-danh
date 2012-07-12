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
	function add($post_author,$post_date,$post_content,$post_title,$post_excerpt,$post_type,$featured_image,$arr_category,$post_id=0){		
		$arr=array(
			'post_author'=>$post_author,
			'post_date'=>$post_date,
			'post_content'=>$post_content,
			'post_title'=>$post_title,
			'post_excerpt'=>$post_excerpt,			
			'post_type'=>$post_type,
			'post_parent'=>$post_id	
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
		if($post_type == 'post'){		
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
		}elseif($post_type == 'topic'){
			foreach($arr_category as $category){				
				$arrcat = array(
					'object_id'=>$last_id,
					'term_taxonomy_id'=>$category->term_taxonomy_id
				);
				$this->db->insert('ci_term_relationships',$arrcat);	
			}
		}
		return $last_id;
	}
	
	//Update posts
	function update($id,$post_author,$post_modified,$post_content,$post_title,$post_excerpt,$featured_image,$arr_category,$post_parent=0,$post_type){		
		$flag = true;
		$arr=array(
			'post_author'=>$post_author,
			'post_modified'=>$post_modified,
			'post_content'=>$post_content,
			'post_title'=>$post_title,
			'post_excerpt'=>$post_excerpt,
			'post_parent'=>$post_parent	
		);
		//update post
		$this->db->where('id',$id);
		if( !$this->db->update('ci_posts',$arr)){$flag=false;}
		//Update featured image
		//check exits featured image
		$query = $this->db->get_where('ci_postmeta',array('post_id'=>$id,'meta_key'=>'featured_image'));
		$result = $query->result();
		if(count($result) > 0){
			$arrmeta = array(
				'meta_value'=>$featured_image
			);
			$this->db->where('post_id',$id);
			$this->db->where('meta_key','featured_image');
			if(!$this->db->update('ci_postmeta',$arrmeta)){$flag=false;}
		}else{
			//Insert featured image
			$arrmeta = array(
				'post_id'=>$id,
				'meta_key'=>'featured_image',
				'meta_value'=>$featured_image
			);
			$this->db->insert('ci_postmeta',$arrmeta);		
		}		
		//Update category
		if(count($arr_category) > 0){
			if(!$this->db->query("DELETE FROM ci_term_relationships WHERE object_id=".$id." AND term_taxonomy_id IN(SELECT term_taxonomy_id FROM ci_term_taxonomy WHERE taxonomy='category')")){$flag=false;}		
			if($post_type == 'post'){
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
			}elseif($post_type == 'topic'){
				foreach($arr_category as $category){				
					$arrcat = array(
						'object_id'=>$id,
						'term_taxonomy_id'=>$category->term_taxonomy_id
					);
					$this->db->insert('ci_term_relationships',$arrcat);	
				}
			}
		}
		return $flag;
	}	
	//List Posts	
	function get($id, $post_type='post', $term_id=0,$author='', $limit=-1, $offset=0, $order='DESC', $order_by='post_date'){
		$this->db->select('
					ci_posts.id,
					post_author,
					user_nicename,
					post_date,
					post_title,
					post_excerpt,
					post_content,
					post_type,
					post_parent					
				');
		$this->db->from('ci_posts');
		$this->db->join('ci_users','post_author=ci_users.id');
		if($id == 0){											
			if($author != ''){
				$this->db->where('ci_users.id',$author);
			}
			if($term_id != '' and $term_id > 0 ){
				$this->db->join('ci_term_relationships','ci_posts.id=object_id');
				$this->db->join('ci_term_taxonomy','ci_term_relationships.term_taxonomy_id = ci_term_taxonomy.term_taxonomy_id');	
				$this->db->where('ci_term_taxonomy.term_id',$term_id);	
			}			
			$this->db->where('post_type',$post_type);
			$this->db->order_by($order_by, $order);
			if($limit > 0){
				$this->db->limit($limit,$offset);
			}
			$query = $this->db->get();
			return $query->result();
		}elseif($id > 0){								
			$this->db->where('ci_posts.id',$id);
			$query = $this->db->get();
			return $query->result();	
		}
	}	
	function getCount($post_type='post', $term_id=0, $author=''){		
		$this->db->from('ci_posts');
		$this->db->where('post_type',$post_type);
		if($author != ''){
			$this->db->join('ci_users','post_author=ci_users.id');
			$this->db->where('ci_users.id',$author);
		}
		if($term_id != '' and $term_id > 0 ){
			$this->db->join('ci_term_relationships','ci_posts.id=object_id');
			$this->db->join('ci_term_taxonomy','ci_term_relationships.term_taxonomy_id = ci_term_taxonomy.term_taxonomy_id');	
			$this->db->where('ci_term_taxonomy.term_id',$term_id);	
		}
		return $this->db->count_all_results();
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
	function get_author_name($post_id){
		$this->db->select('user_nicename');
		$this->db->from('ci_posts');
		$this->db->join('ci_users','post_author=ci_users.id');
		$this->db->where('ci_posts.id',$post_id);
		$query = $this->db->get();
		foreach($query->result() as $row){
			return $row->user_nicename;	
		}
        return '';
	}
	function get_meta_value($post_id,$meta_key){
		$this->db->select('meta_value');
		$this->db->from('ci_postmeta');
		$this->db->where('post_id',$post_id);
		$this->db->where('meta_key',$meta_key);
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
	//Get id last record
	function get_id_last_row(){
		$query = $this->db->get('ci_posts');			
		$last_row = $query->last_row();
		return $last_row->ID;
	}	
	function get_term_taxonomy_id_by_term($term_id){
			
	}
}
?>