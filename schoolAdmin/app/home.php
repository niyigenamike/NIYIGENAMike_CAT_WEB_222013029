<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
 			</div>

			<ul class="box-info">
				<?php include_once("includes/cards.php"); 
				     $student = "SELECT COUNT(*) AS student FROM student";
					 $student = $conn->query($student);
					 $student = $student->fetch_assoc();
					 $student = $student['student'];
					 $lectures = "SELECT COUNT(*) AS lectures FROM lectures";
					 $lectures = $conn->query($lectures);
					 $lectures = $lectures->fetch_assoc();
					 $lectures = $lectures['lectures'];

 				 
					 generateCard($student, 'All Students');
					 generateCard($lectures, 'All Lectures');
				 
				
 				?>
 			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Student List</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
							<th>Cnt</th>
							<th>Name</th>
								<th>Email</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
						<?php
            // Fetch data from the sales table
            $sql = "SELECT * FROM student";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["fullname"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["address"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }
            ?>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<?php include_once('includes/footer.php') ?>

		<script>
        $(function(){                
			start_loader();
        })
    </script>