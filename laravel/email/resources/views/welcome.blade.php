<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

@if(session()->has('success'))
<span class="alert alert-success">{{session('success')}}</span>
@endif	

<div class="container mt-3">
  <h2>Send Email</h2>
  <form method="post" action="{{url('/send_mail')}}">
	@csrf
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Subject:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Subject" name="subject">
    </div>
	
	 <div class="mb-3">
      <label for="pwd">Comment:</label>
      <textarea class="form-control" placeholder="Enter Comment" name="comment"></textarea>
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
