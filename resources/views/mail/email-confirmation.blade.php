<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
</head>
<body>
	<h1>Чтобы подтвердить ваш имэил перейдите по ссылке</h1>
	<a href="{{route('confirm-email', [$user, $token])}}">Ссылка</a>
</body>
</html>