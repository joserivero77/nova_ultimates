<script>
var appInvoice = {
    appName: '[FACTURAS] - Internet Services',
    init: function () {
        "use strict";

        this.renderApp();
    },
    renderApp: function () {
        $('.brand-name').text(appInvoice.appName);
    },
    appSettings: function () {

    },
    bindEvents: function () {

    },
    validateInvoiceForm: function () {

    }
};

appInvoice.init();
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');

:root {
    --brand-name: var(--white);
    --secondary:#F0B862;
}

body {
  color:#484848;
  font-size:.86rem;
}

.panel {
    width:320px;
}

.main {
    margin-left:320px;
}

.invoice-list {
    position:absolute;
    top:68px;
    left:5px;

    .amount {
        font-size:1.6em;
        font-weight:700;
        text-align:right;
    }
}

.container {
  max-width:1200px;
    min-width:420px;
}

.table {
  tr th {
    font-size:.75rem;
    text-transform:uppercase;
  }
  tr td {
    font-size:.78rem;
  }
}

.svg-icon {
  width: 1.2em;
  height: 1.2em;
    padding:0;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: #6A1B9A;
}

.svg-icon circle {
  stroke: #6A1B9A;
  stroke-width: 1;
}

.footer .footer-app {
    text-align:center;
    font-size:.78rem;
    padding:10px;
}

// APP
.navbar {
    .brand-name {
        font-family: 'Montserrat', sans-serif;
        font-size:1.3em;
        font-weight:300;
        color:var(--brand-name);
    }
    .nav-item {
        text-transform:uppercase;
        &.active .nav-link {
            color:var(--secondary);
            .svg-icon path,
            .svg-icon polygon,
            .svg-icon rect {
              fill: var(--secondary);
            }
            .svg-icon circle {
              stroke: var(--secondary);
            }
        }
        .svg-icon {
            margin-top:-4px;
        }
        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect {
          fill: #FFF;
        }
        .svg-icon circle {
          stroke: #FFF;
        }
    }
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand brand-name animate__animated animate__fadeInUp" href="#">[My Company Name] - Services</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                    </svg>
                    Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                    </svg>
                    Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M10,1.75c-4.557,0-8.25,3.693-8.25,8.25c0,4.557,3.693,8.25,8.25,8.25c4.557,0,8.25-3.693,8.25-8.25C18.25,5.443,14.557,1.75,10,1.75 M10,17.382c-4.071,0-7.381-3.312-7.381-7.382c0-4.071,3.311-7.381,7.381-7.381c4.07,0,7.381,3.311,7.381,7.381C17.381,14.07,14.07,17.382,10,17.382 M7.612,10.869c-0.838,0-1.52,0.681-1.52,1.519s0.682,1.521,1.52,1.521c0.838,0,1.52-0.683,1.52-1.521S8.45,10.869,7.612,10.869 M7.612,13.039c-0.359,0-0.651-0.293-0.651-0.651c0-0.357,0.292-0.65,0.651-0.65c0.358,0,0.651,0.293,0.651,0.65C8.263,12.746,7.97,13.039,7.612,13.039 M7.629,6.11c-0.838,0-1.52,0.682-1.52,1.52c0,0.838,0.682,1.521,1.52,1.521c0.838,0,1.521-0.682,1.521-1.521C9.15,6.792,8.468,6.11,7.629,6.11M7.629,8.281c-0.358,0-0.651-0.292-0.651-0.651c0-0.358,0.292-0.651,0.651-0.651c0.359,0,0.651,0.292,0.651,0.651C8.281,7.988,7.988,8.281,7.629,8.281 M12.375,10.855c-0.838,0-1.521,0.682-1.521,1.52s0.683,1.52,1.521,1.52s1.52-0.682,1.52-1.52S13.213,10.855,12.375,10.855 M12.375,13.026c-0.358,0-0.652-0.294-0.652-0.651c0-0.358,0.294-0.652,0.652-0.652c0.357,0,0.65,0.294,0.65,0.652C13.025,12.732,12.732,13.026,12.375,13.026 M12.389,6.092c-0.839,0-1.52,0.682-1.52,1.52c0,0.838,0.681,1.52,1.52,1.52c0.838,0,1.52-0.681,1.52-1.52C13.908,6.774,13.227,6.092,12.389,6.092 M12.389,8.263c-0.36,0-0.652-0.293-0.652-0.651c0-0.359,0.292-0.651,0.652-0.651c0.357,0,0.65,0.292,0.65,0.651C13.039,7.97,12.746,8.263,12.389,8.263"></path>
                    </svg>
                    Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M15.475,6.692l-4.084-4.083C11.32,2.538,11.223,2.5,11.125,2.5h-6c-0.413,0-0.75,0.337-0.75,0.75v13.5c0,0.412,0.337,0.75,0.75,0.75h9.75c0.412,0,0.75-0.338,0.75-0.75V6.94C15.609,6.839,15.554,6.771,15.475,6.692 M11.5,3.779l2.843,2.846H11.5V3.779z M14.875,16.75h-9.75V3.25h5.625V7c0,0.206,0.168,0.375,0.375,0.375h3.75V16.75z"></path>
                    </svg>
                    Facturas</a>
            </li>
        </ul>
        <span class="navbar-text">
            Navbar text with an inline element
        </span>
    </div>
</nav>

<div class="panel invoice-list">
    <div class="list-group animate__animated animate__fadeInLeft">
      <a href="#" class="list-group-item list-group-item-action active">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Nombre de cliente</h5>
          <small>3 days ago</small>
        </div>
        <p class="amount mb-0">3.200€.</p>
        <div>Concepto de la factura.</div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Nombre de cliente</h5>
          <small class="text-muted">3 days ago</small>
        </div>
        <p class="amount mb-1">700€</p>
        <div class="text-muted">Donec id elit non mi porta.</div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Nombre de cliente</h5>
          <small class="text-muted">3 days ago</small>
        </div>
        <p class="amount mb-1">1200€</p>
        <div class="text-muted">Donec id elit non mi porta.</div>
      </a>
    </div>
</div>

<div class="main">
    <div class="container mt-3">
        <div class="card animate__animated animate__fadeIn">
            <div class="card-header">
                Fecha
                <strong>01/01/2018</strong>
                <span class="float-right"> <strong>Estado:</strong> Pendiente</span>

            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-6 col-md-6">
                        <h6 class="mb-2">From:</h6>
                        <div>
                            <strong>Webz Poland</strong>
                        </div>
                        <div>Madalinskiego 8</div>
                        <div>71-101 Szczecin, Poland</div>
                        <div>Email: info@webz.com.pl</div>
                        <div>Phone: +48 444 666 3333</div>
                    </div>

                    <div class="col-6 col-md-6">
                        <h6 class="mb-2">To:</h6>
                        <div>
                            <strong>Bob Mart</strong>
                        </div>
                        <div>Attn: Daniel Marek</div>
                        <div>43-190 Mikolow, Poland</div>
                        <div>Email: marek@daniel.com</div>
                        <div>Phone: +48 123 456 789</div>
                    </div>

                </div>

                <div class="table-responsive-sm">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="2%" class="center">#</th>
                                <th scope="col" width="20%">Producto/Servicio</th>
                                <th scope="col" class="d-none d-sm-table-cell" width="50%">Descripción</th>

                                <th scope="col" width="10%" class="text-right">P. Unidad</th>
                                <th scope="col" width="8%" class="text-right">Num.</th>
                                <th scope="col" width="10%" class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">1</td>
                                <td class="item_name">Origin License</td>
                                <td class="item_desc d-none d-sm-table-cell">Extended License</td>

                                <td class="text-right">999,00€</td>
                                <td class="text-right">1</td>
                                <td class="text-right">999,00€</td>
                            </tr>
                            <tr>
                                <td class="center">2</td>
                                <td class="item_name">Custom Services</td>
                                <td class="item_desc d-none d-sm-table-cell">Instalation and Customization (cost per hour)</td>

                                <td class="text-right">150,00€</td>
                                <td class="text-right">20</td>
                                <td class="text-right">3.000,00€</td>
                            </tr>
                            <tr>
                                <td class="center">3</td>
                                <td class="item_name">Hosting</td>
                                <td class="item_desc d-none d-sm-table-cell">1 year subcription</td>

                                <td class="text-right">499,00€</td>
                                <td class="text-right">1</td>
                                <td class="text-right">499,00€</td>
                            </tr>
                            <tr>
                                <td class="center">4</td>
                                <td class="item_name">Platinum Support</td>
                                <td class="item_desc d-none d-sm-table-cell">1 year subcription 24/7</td>

                                <td class="text-right">3.999,00€</td>
                                <td class="text-right">1</td>
                                <td class="text-right">3.999,00€</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-sm table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="text-right bg-light">8.497,00€</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Discount (20%)</strong>
                                    </td>
                                    <td class="text-right bg-light">1,699,40€</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>VAT (10%)</strong>
                                    </td>
                                    <td class="text-right bg-light">679,76€</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="text-right bg-light">
                                        <strong>7.477,36€</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="footer container-fluid mt-3 bg-light">
    <div class="row">
        <div class="col footer-app">&copy; Todos los derechos reservados · <span class="brand-name"></span></div>
    </div>
</div>
@section('scripts')
