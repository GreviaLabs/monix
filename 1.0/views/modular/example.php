<?php 
$this->loadView('templates.general.layout_header');

// $listdata = $this->model->
$q = "SELECT member_id,full_name,name,gender,linkedin FROM grv_member LIMIT 7";
// $db = new Db();
// $db->query($q);
// $listdata = $db->resultAll()->to_json();

// this ok
$this->db->query($q);
$listdata = $this->db->result_array();
// $listdata = $this->db->to_json(); 
// unset($listdata['about_me']);
// unset($listdata['secure_notes']);
// unset($listdata['CreatorDateTime']);
$listdata = json_encode($listdata);
// this cannot do
// $listdata = $this->db->query($q)->resultAll();

echo ($listdata).BR;
// debug($this->db->last_query());
?>

This is example Monix

<?php 
$this->loadView('templates.general.layout_footer');
?>