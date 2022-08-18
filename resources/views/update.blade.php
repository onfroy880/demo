<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href={{asset("css/bootstrap.min.css")}}>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<title>Demo</title>
</head>
<body style="margin: 0 20%;">
    
    <!-- formulaire d'enregistrement -->
    <div style="text-align: center"><h3>Register product</h3></div>

    @foreach ($products as $item)
    <form action={{route('check')}} method="POST" style="margin: 1% 10%;">
        @csrf

        <input type="hidden" name="id" value={{$item->id}}>

        <div class="form-group">
            <label for="exampleFormControlInput3">Product name</label>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="name" value={{$item->NamePro}} required>
        </div>

        <section style="align-items: center; display: flex; justify-content: space-between;">
            <div class="form-group" style="width: 48%;">
                <label for="exampleFormControlInput1">Price</label>
                <input type="number" class="form-control" id="inlineFormInputGroup" name="price" value={{$item->Price}} required>
            </div>
            
            <div class="form-group" style="width: 48%;">
                <label for="exampleFormControlInput1">Quantity</label>
                <input type="number" class="form-control" id="inlineFormInputGroup" name="quantity" value={{$item->Quantity}} required>
            </div>
        </section>

        <div class="form-group">
            <label for="exampleFormControlInput3">Description</label>
            <textarea name="description" class="form-control" id="inlineFormInputGroup" cols="30" rows="5" >{{$item->Description}}</textarea>
        </div>

        <br>

        <button type="submit" class="btn btn-primary" id="btn" style="width: 100%;">REGISTER</button>

    </form>
    @endforeach

	<!-- link to javascript -->
	<script type={{asset("js/bootstrap.min.js")}}></script>
</body>
</html>