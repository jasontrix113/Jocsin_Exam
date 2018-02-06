<?php
    require '../CIT358MidtermExam18/include/dbconnection.php';


    if(!empty($_POST))
    {
        $title = $_POST['title'];
        $pages = $_POST['pages'];
        $author = $_POST['author'];
        $year = $_POST['year'];

        $insert = mysqli_query($conn, "INSERT INTO `book_table` (`title`, `pages`, `author`, `year`) VALUES ('$title', '$pages', '$author', '$year');");
    }
?>
    <?php
            $record = mysqli_query($conn,"SELECT * FROM `book_table`");
                if( mysqli_num_rows( $record ) > 0 )
        ?>

<html>

<head>
	<title>Book Information</title>
    <link href="assets/css/reg.css" rel="stylesheet">
</head>

<body>
	<form action="" method="post">
	<h1>Library Database</h1>
	<fieldset>
		<legend>Book Information</legend>
		<label>Title:</label> <input type="text" name="title" required/><br />
		<label>Pages:</label> <input type="number" min=1 name="pages" required/><br />
		<label>Author:</label> <input type="text" name="author" required/><br />
		<label>Published Year:</label> <input type="text" name="year" required/>
        <div><br/></div>
    <input style="float:right" type="submit" value="Add Book" onClick="return submit_form();" name="submit"/>
    </fieldset>
    <h3>List of Stored Books</h3>
    
    <table border="2" align="center" cellpadding=5>
            <thead>
                <tr><th>Title</th>
                    <th>Pages</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php while( $val = mysqli_fetch_array( $record ) ): ?>
                <tr>
                    <td><?php echo $val['title']?></td>
                    <td><?php echo $val['pages']?></td>
                    <td><?php echo $val['author']?></td>
                    <td><?php echo $val['year']?></td>
                    <td><input type="button" name="edit" value="Edit">    
                </tr>
                <?php endwhile ?>            
            </tbody>
        </table>
	</form>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		function submit_form(){
			alert("A new book has been successfully added!");
		}
	</script>

</body>
</html>