<style>

@import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body,
html {
	height: 100vh;
	display: grid;
	font-family: "Staatliches", cursive;
	background: #d83565;
	color: black;
	font-size: 14px;
	letter-spacing: 0.1em;
}

.ticket {
	margin: auto;
	display: flex;
	background: white;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.left {
	display: flex;
}

.image {
	height: 250px;
	width: 250px;
	background-image: url("https://media.pitchfork.com/photos/60db53e71dfc7ddc9f5086f9/1:1/w_1656,h_1656,c_limit/Olivia-Rodrigo-Sour-Prom.jpg");
	background-size: contain;
	opacity: 0.85;
}

.admit-one {
	position: absolute;
	color: darkgray;
	height: 250px;
	padding: 0 10px;
	letter-spacing: 0.15em;
	display: flex;
	text-align: center;
	justify-content: space-around;
	writing-mode: vertical-rl;
	transform: rotate(-180deg);
}

.admit-one span:nth-child(2) {
	color: white;
	font-weight: 700;
}

.left .ticket-number {
	height: 250px;
	width: 250px;
	display: flex;
	justify-content: flex-end;
	align-items: flex-end;
	padding: 5px;
}

.ticket-info {
	padding: 10px 30px;
	display: flex;
	flex-direction: column;
	text-align: center;
	justify-content: space-between;
	align-items: center;
}

.date {
	border-top: 1px solid gray;
	border-bottom: 1px solid gray;
	padding: 5px 0;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: space-around;
}

.date span {
	width: 100px;
}

.date span:first-child {
	text-align: left;
}

.date span:last-child {
	text-align: right;
}

.date .june-29 {
	color: #d83565;
	font-size: 20px;
}

.show-name {
	font-size: 32px;
	font-family: "Nanum Pen Script", cursive;
	color: #d83565;
}

.show-name h1 {
	font-size: 48px;
	font-weight: 700;
	letter-spacing: 0.1em;
	color: #4a437e;
}

.time {
	padding: 10px 0;
	color: #4a437e;
	text-align: center;
	display: flex;
	flex-direction: column;
	gap: 10px;
	font-weight: 700;
}

.time span {
	font-weight: 400;
	color: gray;
}

.left .time {
	font-size: 16px;
}


.location {
	display: flex;
	justify-content: space-around;
	align-items: center;
	width: 100%;
	padding-top: 8px;
	border-top: 1px solid gray;
}

.location .separator {
	font-size: 20px;
}

.right {
	width: 180px;
	border-left: 1px dashed #404040;
}

.right .admit-one {
	color: darkgray;
}

.right .admit-one span:nth-child(2) {
	color: gray;
}

.right .right-info-container {
	height: 250px;
	padding: 10px 10px 10px 35px;
	display: flex;
	flex-direction: column;
	justify-content: space-around;
	align-items: center;
}

.right .show-name h1 {
	font-size: 18px;
}

.barcode {
	height: 100px;
}

.barcode img {
	height: 100%;
}

.right .ticket-number {
	color: gray;
}

</style>
<link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div class="ticket">
	<div class="left">
		<div class="image">
			<p class="admit-one">
				<span>ID Show</span>
				<span>ID Show</span>
				<span>ID Show</span>
			</p>
			<div class="ticket-number">
				<p>
					<?php
                        echo $_GET['id'];
                    ?>
				</p>
			</div>
		</div>
		<div class="ticket-info">
			<p class="date">
				<span>Date</span>
				<span class="june-29">
                    <?php 
                    require "../config/pdoconfig.php";
                    $id = $_GET['id'];
                          $query = "select * from tickets where orderid='$id'";
                          $statement = $connection->prepare($query);
                          $statement->execute();
                          $result = $statement->fetchAll();
                    if ($result) {
                        
                        foreach ($result as $row) {
                            $m_id = $row['m_id'];
                            $t_id = $row['t_id'];
                            $s_id = $row['s_id'];
                            $query1 = "select * from movie where id='$m_id'";
                                $statement1 = $connection->prepare($query1);
                                $statement1->execute();
                                $result1 = $statement1->fetchAll();
                                if ($result1) {
                                    foreach ($result1 as $row1) {
                                        $movie_name = $row1['name'];
                                    }
                                }
                                $query2 = "select * from theatre where id='$t_id'";
                                $statement2 = $connection->prepare($query2);
                                $statement2->execute();
                                $result2 = $statement2->fetchAll();
                                if ($result2) {
                                    foreach ($result2 as $row2) {
                                        $theatre_name = $row2['name'];
                                    }
                                }
                                $show = $row['shows'];
								$seats = $row['seats'];
                            echo $row['date'];
                        }}
                        
                    ?>
                </span>
				<span></span>
			</p>
			<div class="show-name">
				<h1><?php echo $theatre_name; ?></h1>
				<h2><?php echo $movie_name; ?></h2>
			</div>
			<div class="time">
			<p><?php echo $seats; ?></p>
				<p>DOORS <span>@</span> <?php echo $show; ?></p>
			</div>
			<p class="location"><span>ID Show</span>
				<span class="separator"><i class="far fa-smile"></i></span><span>Banglore</span>
			</p>
		</div>
	</div>
	<div class="right">
		<p class="admit-one">
			<span>ID Show</span>
			<span>ID Show</span>
			<span>ID Show</span>
		</p>
		<div class="right-info-container">
			<div class="show-name">
				<h1><?php echo $theatre_name; ?></h1>
			</div>
			<div class="time">
				
				<p>DOORS <span>@</span> <?php echo $show; ?></p>
			</div>
			
			<p class="ticket-number">
				<?php echo $id; ?>
			</p>
		</div>
	</div>
</div>