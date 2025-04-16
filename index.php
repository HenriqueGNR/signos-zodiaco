<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Descubra seu Signo</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="assets/imgs/zodiac-wheel.png" alt="Roda do Zodíaco" class="img-fluid zodiac-img">
                    </div>
                    
                    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Consultar Signo</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center text-muted">
                    Descubra características da sua personalidade baseadas no seu signo zodiacal
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
crossorigin="anonymous"></script>

</body>
</html>
