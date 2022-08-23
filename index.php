<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Calculadora de IP</title>
</head>
<body>
    <form action="resposta.php" method="post" style="padding: 7px;" class="row g-3">
        <label class="form-label">Informe o endereço de IPv4 e a máscara de rede: </label>
        <div class="col-auto">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text">IPv4 : </span>
                <input required type="number" id="parte1" name="parte1" min="0" max="255" class="form-control"><span class="input-group-text"> . </span>
                <input required type="number" id="parte2" name="parte2" min="0" max="255" class="form-control"><span class="input-group-text"> . </span>
                <input required type="number" id="parte3" name="parte3" min="0" max="255" class="form-control"><span class="input-group-text"> . </span>
                <input required type="number" id="parte4" name="parte4" min="0" max="255" class="form-control">
            </div>
        </div>
        <div class="col-auto">
            <div class="input-group input-group-sm">
                <span class="input-group-text">Máscara de rede: </span>
                <select required name="mascara" class="form-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                </select>
                <button type="submit" class="btn btn-dark">Calcular</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>