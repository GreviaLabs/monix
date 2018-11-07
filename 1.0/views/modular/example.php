<?php 
$this->loadView('templates.general.layout_header');

// $listdata = $this->model->
$q = "SELECT * FROM grv_member LIMIT 7";
// $db = new Db();
// $db->query($q);
// $listdata = $db->resultAll()->to_json();

// this ok
$this->db->query($q);
$listdata = $this->db->result_array();
$listdata = $this->db->to_json(); 

// this cannot do
// $listdata = $this->db->query($q)->resultAll();

debug($listdata);
// debug($this->db->last_query());
?>

This is example Monix

<?php 
$this->loadView('templates.general.layout_footer');
?>