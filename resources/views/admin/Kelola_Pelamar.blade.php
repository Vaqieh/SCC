@extends('layouts.admin', ['title' => 'Kelola Pelamar'])
@section('content')

    <!-- content -->
    <div class="content ">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col-lg-7 col-md-12">
                <div class="card widget h-100">
                    <div class="card-header d-flex">
                        <h6 class="card-title">
                            Sales Chart
                            <a href="#" class="bi bi-question-circle ms-1 small" data-bs-toggle="tooltip"
                               title="Daily orders and sales"></a>
                        </h6>
                        <div class="d-flex gap-3 align-items-center ms-auto">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">View Detail</a>
                                    <a href="#" class="dropdown-item">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="display-7 me-3">
                                    <i class="bi bi-bag-check me-2 text-success"></i> $10.552,40
                                </div>
                                <span class="text-success">
                                    <i class="bi bi-arrow-up me-1 small"></i>8.30%
                                </span>
                            </div>
                            <div class="d-flex gap-4 align-items-center ms-auto mt-3 mt-lg-0">
                                <select class="form-select">
                                    <option>Sort by</option>
                                    <option value="desc">Desc</option>
                                    <option value="asc">Asc</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn btn-outline-light" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="dropdown ms-auto">
                    <a href="#" data-bs-toggle="dropdown"
                       class="btn btn-primary dropdown-toggle"
                       aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-custom table-lg mb-0" id="orders">
            <thead>
            <tr>
                <th>
                    <input class="form-check-input select-all" type="checkbox" data-select-all-target="#orders"
                           id="defaultCheck1">
                </th>
                <th>Nama Perusahaan</th>
                <th>Jenis Industri </th>
                <th>Negara</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kabupaten</th>
                <th>Tahun Berdiri</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>

            <tr>

                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown"
                               class="btn btn-floating"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Show</a>
                                <a href="#" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="card-body">
                        <p class="text-muted">Products added today. Click <a href="#">here</a> for more details</p>
                        <div class="table-responsive">
                            <table class="table table-custom mb-0" id="recent-products">
                                <thead>
                                <tr>
                                    <th>
                                        <input class="form-check-input select-all" type="checkbox"
                                               data-select-all-target="#recent-products" id="defaultCheck1">
                                    </th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img src="../images/products/10.jpg" class="rounded" width="40"
                                                 alt="...">
                                        </a>
                                    </td>
                                    <td>Cookie</td>
                                    <td>
                                        <span class="text-danger">Out of Stock</span>
                                    </td>
                                    <td>$10,50</td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown"
                                                   class="btn btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">Action</a>
                                                    <a href="#" class="dropdown-item">Another action</a>
                                                    <a href="#" class="dropdown-item">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img src="../images/products/7.jpg" class="rounded" width="40"
                                                 alt="...">
                                        </a>
                                    </td>
                                    <td>Glass</td>
                                    <td>
                                        <span class="text-success">In Stock</span>
                                    </td>
                                    <td>$70,20</td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown"
                                                   class="btn btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">Action</a>
                                                    <a href="#" class="dropdown-item">Another action</a>
                                                    <a href="#" class="dropdown-item">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img src="../images/products/8.jpg" class="rounded" width="40"
                                                 alt="...">
                                        </a>
                                    </td>
                                    <td>Headphone</td>
                                    <td>
                                        <span class="text-success">In Stock</span>
                                    </td>
                                    <td>$870,50</td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown"
                                                   class="btn btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">Action</a>
                                                    <a href="#" class="dropdown-item">Another action</a>
                                                    <a href="#" class="dropdown-item">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img src="../images/products/9.jpg" class="rounded" width="40"
                                                 alt="...">
                                        </a>
                                    </td>
                                    <td>Perfume</td>
                                    <td>
                                        <span class="text-success">In Stock</span>
                                    </td>
                                    <td>$170,50</td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown"
                                                   class="btn btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">Action</a>
                                                    <a href="#" class="dropdown-item">Another action</a>
                                                    <a href="#" class="dropdown-item">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
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
        <!-- ./ content -->
=======
                </td>
            </tr>
            </tbody>
        </table>
    </div>
>>>>>>> 7f786d981840ad74274cfb92b7eee9ebc53f9379

    <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    </div>
    <!-- ./ content -->

@endsection
