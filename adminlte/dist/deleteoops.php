
<?php require_once'conectivityoops.php';
?>

<?php //Deletion
if(isset($_GET['id']))
    {
// Geeting deletion row id
$id = $_GET['id'];

// $rid=$_GET['del'];
$deletedata=new DB_con();
$sql=$deletedata->delete($id);
if($sql)
{
echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='listingoops.php'</script>";
}
    }
?>

