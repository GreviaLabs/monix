<?php 
$this->loadView('templates.general.layout_header');
?>

<?php 

$q = "SELECT member_id, full_name, email FROM grv_member LIMIT 10";
$this->db->query($q);
$listdata = $this->db->resultAll();
// debug($listdata);
$listdata = $this->db->to_json();
?>


<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- production version, optimized for size and speed -->
<!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->

<div id="app">

  <span v-if="is_member">Selamat datang member</span>
  
  <span v-if="is_not_member">Selamat datang non member</span>

    <ol>
        <li v-for="rs in listdata">
        {{ rs.email }}
        </li>
    </ol>
<?php 
// $q = "SELECT article_id FROM grv_article LIMIT 15";
// $listdata = $this->db->query($q);
// $listdata = $this->db->result_array();
?>
</div>

<?php 
$this->loadView('templates.general.layout_footer');
?>
<script type="text/javascript">
var app = new Vue({
  el: '#app',
  data: {
    listdata: <?php echo $listdata ?>,
    is_member: 1,
    is_not_member: 0,
    
  }
})
</script>