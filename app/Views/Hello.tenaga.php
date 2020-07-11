<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenaga Framework</title>
</head>
<body>
    Hello
    {% for u in user %}
        {{ u.name }}
    {% endfor %}

    {{ cookie }}
</body>
</html>