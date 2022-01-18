<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Flight-ticket</title>
</head>
<body>
<div class="container">
    <h2>Flight Booking</h2>
    <?php if(isset($_POST['save'])):?>
    <?php validate($_POST);?>
    <?php if(empty($validationErrors)):?>
        <li class="alert alert-success">Generated</li>
    <?php saveMessage($_POST)?>
        <?php else:?>
        <ul>
        <?php foreach ($validationErrors as $error):?>
            <li class="alert alert-danger"><?=$error;?></li>
        <?php endforeach;?>
        </ul>
    <?php endif;?>
    <?php endif;?>

    <?php if($validationErrors || empty($_POST)):?>
    <form method="post" onsubmit="disabled">
        <div class="mb-3">
            <select class="form-control" name="flightNo">
                <option selected disabled>--Flight Number--</option>
                <?php foreach($Flights as $key=>$Flights):?>
                    <option value="<?=$key;?>"><?=$Flights;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Personal ID Code" name="IDCode" required>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Firstname" name="fname" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Lastname" name="lname" required>
            </div>
            <div class="mb-3">
                <select class="form-control" name="location" required>
                    <option selected disabled>--Departure--</option>
                    <?php foreach($location as $key=>$location):?>
                        <option value="<?=$key;?>"><?=$location;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" name="destination" required>
                    <option selected disabled>--Destination--</option>
                    <?php foreach($destination as $key=>$destination):?>
                        <option value="<?=$key;?>"><?=$destination;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" name="bweight" required>
                    <option selected disabled>--Bagage Weight--</option>
                    <?php foreach($bagage as $key=>$bagage):?>
                        <option value="<?=$key;?>"><?=$bagage;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" name="price" required>
                    <option selected disabled>--Price Options--</option>
                    <?php foreach($price as $key=>$price):?>
                        <option value="<?=$key;?>"><?=$price;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <textarea cols="30" rows="10" class="form-control" placeholder="Remarks" name="remarks"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="save">Generate Ticket</button>
    </form>
    <?php endif;?>
    <section>
        <h3>Clients messages</h3>
        <table class="table table-bordered table striped">
            <tr>
                <th>FLight NO</th>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Flight Location</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Remarks</th>
            </tr>
            <?php foreach(getData() as $list):?>
            <tr>
            <tr>
                    <?php $list = explode(',', $list);?>
                    <?php foreach ($list as $item):?>
                    <?php if(!empty($item)):?>
                            <?=$over = false;
                            if($item === 'over20'){
                              $over = true;
                            }?>

                    <?php if(is_numeric($item) === false && $over === true):?>
                                <td><?=$item;?></td>
                        <?php else:?>
                                <td><?=$item += 30;?></td>

                            <?php endif;?>
                    <?php if(is_numeric($item) === false && $over === false):?>
                        <td><?=$item;?></td>

                    <?php endif;?>
                    <?php endif;?>
                    <?php endforeach;?>

            </tr>
            <?php endforeach;?>
        </table>
    </section>

</div>
</body>
</html>
