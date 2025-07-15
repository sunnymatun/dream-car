<?php

include("connect.php");

if(isset($_POST['update']))
{	

	$id = $_POST['id'];
	$car = $_POST['car'];
	$model = $_POST['model'];
	$engine = $_POST['engine'];
    $wheel = $_POST['wheel'];
    $color = $_POST['color'];	

		$result = mysqli_query($mysqli, "UPDATE datas SET car='$car',model='$model',engine='$engine',wheel='$wheel',color='$color' WHERE id=$id");
		

		header("Location: index.php");
	}
?>

<?php

$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM datas WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$car = $res['car'];
	$model = $res['model'];
	$engine = $res['engine'];
    $wheel = $res['wheel'];
    $color = $res['color'];
}
?>


<html>
<head>	
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
    <link rel="stylesheet" href="AE.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		<tr> 
    <td>ยี่ห้อ</td>
    <td>
        <select name="car" id="car" onchange="updateModels()">
            <option value="">-- เลือกยี่ห้อ --</option>
            <option value="Toyota" <?php if ($car == 'Toyota') echo 'selected'; ?>>Toyota</option>
            <option value="Honda" <?php if ($car == 'Honda') echo 'selected'; ?>>Honda</option>
            <option value="Mazda" <?php if ($car == 'Mazda') echo 'selected'; ?>>Mazda</option>
            <option value="BMW" <?php if ($car == 'BMW') echo 'selected'; ?>>BMW</option>
            <option value="MercedesBenz" <?php if ($car == 'MercedesBenz') echo 'selected'; ?>>Mercedes-Benz</option>
            <option value="Porsche" <?php if ($car == 'Porsche') echo 'selected'; ?>>Porsche</option>
            <option value="Ford" <?php if ($car == 'Ford') echo 'selected'; ?>>Ford</option>
            <option value="Lamborghini" <?php if ($car == 'Lamborghini') echo 'selected'; ?>>Lamborghini</option>
            <option value="Ferrari" <?php if ($car == 'Ferrari') echo 'selected'; ?>>Ferrari</option>
            <option value="AstonMartin" <?php if ($car == 'AstonMartin') echo 'selected'; ?>>Aston Martin</option>
        </select>
    </td>
</tr>

<tr> 
    <td>ชื่อรุ่น</td>
    <td>
        <select name="model" id="model">
            <option value="">-- เลือกรุ่น --</option>
            
        </select>
    </td>
</tr>

<script>
    const carModels = {
        Toyota: ["Supra", "GR86", "Celica", "AE86", "Land Cruiser", "Fortuner", "Hilux", "GR Yaris", "Camry", "Prius"],
        Honda: ["Civic Type R", "NSX", "S2000", "Prelude", "Accord", "City", "HR-V", "CR-V", "WR-V", "BR-V"],
        Mazda: ["MX-5 Miata", "RX-7", "RX-8", "CX-5", "Mazda3", "Mazda6", "MX-30", "CX-30", "Mazda2", "Mazda CX-50"],
        BMW: ["M3", "M4", "i8", "Z4", "M5", "X5 M", "X6 M", "i4", "iX", "X3"],
        MercedesBenz: ["AMG GT", "A-Class", "S-Class", "C-Class", "E-Class", "G-Class", "SL-Class", "GLC", "GLA", "B-Class"],
        Porsche: ["911", "Cayman", "Boxster", "Panamera", "Macan", "Cayenne", "Taycan", "718 Spyder", "911 Turbo", "911 GT3"],
        Ford: ["Mustang", "GT", "F-150", "Focus RS", "Ranger", "Explorer", "Escape", "Bronco", "Maverick", "Edge"],
        Lamborghini: ["Aventador", "Huracán", "Urus", "Gallardo", "Miura", "Sian", "Countach", "Murciélago", "Reventón", "Jalpa"],
        Ferrari: ["488 GTB", "F8 Tributo", "Portofino", "LaFerrari", "Roma", "812 Superfast", "SF90 Stradale", "California T", "GTC4Lusso", "Monza SP1"],
        AstonMartin: ["Vantage", "DB11", "DBS Superleggera", "Rapide", "Valhalla", "DBX", "Valkyrie", "Vanquish", "Virage", "Lagonda"]
    };

    function updateModels() {
        const carSelect = document.getElementById("car");
        const modelSelect = document.getElementById("model");
        const selectedCar = carSelect.value;

        
        modelSelect.innerHTML = "<option value=''>-- เลือกรุ่น --</option>";

        if (selectedCar && carModels[selectedCar]) {
            
            carModels[selectedCar].forEach(model => {
                const option = document.createElement("option");
                option.value = model;
                option.textContent = model;
                modelSelect.appendChild(option);
            });
        }
    }

    
    document.addEventListener("DOMContentLoaded", () => {
        const carSelect = document.getElementById("car");
        const modelSelect = document.getElementById("model");
        const selectedCar = "<?php echo $car; ?>";
        const selectedModel = "<?php echo $model; ?>";

        if (selectedCar) {
            carSelect.value = selectedCar;
            updateModels();
            modelSelect.value = selectedModel;
        }
    });
</script>
		


			<tr> 
				<td>เครื่องยนต์</td>
				<td>
				<select name="engine">
					<option value="Gasoline" <?php if($engine == 'Gasoline') echo'selected';?>>ดีเซล</option>
                    <option value="Diesel" <?php if($engine == 'Diesel') echo'selected';?>>เบนซิน</option>
                    <option value="Electric" <?php if($engine == 'Electric') echo'selected';?>>ไฟฟ้า</option>
					<option value="HYBRID" <?php if($engine == 'HYBRID') echo'selected';?>>ไฮบริด</option>
                </select>
				</td>
			</tr>

            <tr> 
    <td>ระบบขับเคลื่อน</td>
    <td>
        <select name="wheel">
            <option value="2WD" <?php if($wheel == '2WD') echo 'selected'; ?>>2WD</option>
            <option value="4WD" <?php if($wheel == '4WD') echo 'selected'; ?>>4WD</option>
            <option value="AWD" <?php if($wheel == 'AWD') echo 'selected'; ?>>AWD</option>
			<option value="FWD" <?php if($wheel == 'FWD') echo 'selected'; ?>>FWD</option>
			<option value="RWD" <?php if($wheel == 'RWD') echo 'selected'; ?>>RWD</option>
        </select>
    </td>
</tr>

<tr> 
    <td>สีรถ</td>
    <td>
        <input type="color" name="color" value="<?php echo $color; ?>">
    </td>
</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update" class="B"></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="A"><a href="index.php">กลับหน้าหลัก</a></div>
</body>
</html>
