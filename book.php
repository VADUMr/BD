<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
    include_once './controllers/Books.php';
?>

    <h1 class="header">Books</h1>

<?php
$book = new Books();
$arr = $book->getList();
?>
<style>

    .maintable{
        text-align: center ;
    }
    .maintable1{
        text-align: center ;
        color: red;
    }
    .main{
        display: flex; /* встановлення блоку як гнучкого контейнера */
        justify-content: center; /* встановлення горизонтального вирівнювання елементів в центр */
        align-items: center;
    }
    .Image{
        width: 50px;
        height: 50px;
    }
</style>
<div class="main">
    <table class="maintable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Authors</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arr as $s){ ?>
            <tr>
                <td><?php echo $s->id; ?></td>
                <td><?php if($s->image_name!= NULL){?><img class = "Image"  src="../uploads/<?php echo $s->image_name; ?>"><?php } ?></td>
                <td><?php echo $s->title; ?></td>
                <td><?php echo $s->authors; ?></td>
                <td><a href="./controllers/Books.php?Action=Delete&id=<?=$s->id; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="maintable1"><?php for ($page=1;$page<=$book->getRowCount();$page++){
    echo '<a href = "book.php?page='.$page.'">'.$page.'</a> ⠀⠀';}?>
</div>

     <form method="post"  action= "./controllers/Books.php" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Enter title" />
        <input type="text" name="authors" placeholder="Enter Authors" />
         <input type="file" name="fileToUpload" id="fileToUpload">
         <div class="maintable">
        <button style="width: 100%;" type="submit" name="submit">Add</button>
         </div>
    </form>



<?php 
    include_once 'footer.php'
?>