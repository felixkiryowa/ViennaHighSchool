/*--------------------------RETRIEVE STUDENT INFO------------------------------------------------------------------------*/
var manage_teachers_table;
$(document).ready(function(){
  teachers_table= $('#manage_reports_table').DataTable({
    "ajax": "../controllers/User.php",
    "order": []
}); 
});
/*-------------------------END RETRIEVE STUDENT INFO----------------------------------------------------------------------*/
