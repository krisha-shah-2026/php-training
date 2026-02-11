
<?php require_once 'conectivityoops.php';
?>

<?php 
if(isset($_GET['id']))
    {

$id = $_GET['id'];

$deletedata=new DB_con();
$sql=$deletedata->delete($id);
if($sql)
{
// echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='listingoops.php'</script>";
}
    }
?>

