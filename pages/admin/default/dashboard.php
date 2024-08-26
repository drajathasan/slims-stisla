<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">
                    <?= __('Summary') ?>
                </div>
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count" id="item">-</div>
                        <div class="card-stats-item-label"><?= __('Total of Items') ?></div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count" id="item_lent">-</div>
                        <div class="card-stats-item-label"><?= __('Lent') ?></div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count" id="item_available">-</div>
                        <div class="card-stats-item-label"><?= __('Available') ?></div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-sky">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><?= __('Total of Collections') ?></h4>
                </div>
                <div id="bibliography" class="card-body">
                    -
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="balance-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-rose">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Perolehan Denda <small class="font-weight-bold">(7 hari terakhir)</small></h4>
                </div>
                <div class="card-body" id="fines">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="sales-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-lime">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Aktivitas Anda (7 hari terakhir)</h4>
                </div>
                <div id="activities" class="card-body">
                    -
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4><?= __('Latest Transactions') ?></h4>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="158"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card gradient-bottom">
            <div class="card-header">
                <h4>5 Anggota Teraktif <small>(7 hari terakhir)</small></h4>
            </div>
            <div class="card-body" id="top-5-scrol">
                <ul id="members" class="list-unstyled list-unstyled-border">
                    
                </ul>
            </div>
            <div class="card-footer pt-3 d-flex justify-content-center">
                <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Dikembalikan</div>
                </div>
                <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Sedang Dipinjam</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Buku Yang Anda Masukan</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-danger">Tambah Bibliografi <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Invoice ID</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><a href="#">INV-87239</a></td>
                            <td class="font-weight-600">Kusnadi</td>
                            <td>
                                <div class="badge badge-warning">Unpaid</div>
                            </td>
                            <td>July 19, 2018</td>
                            <td>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#">INV-48574</a></td>
                            <td class="font-weight-600">Hasan Basri</td>
                            <td>
                                <div class="badge badge-success">Paid</div>
                            </td>
                            <td>July 21, 2018</td>
                            <td>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#">INV-76824</a></td>
                            <td class="font-weight-600">Muhamad Nuruzzaki</td>
                            <td>
                                <div class="badge badge-warning">Unpaid</div>
                            </td>
                            <td>July 22, 2018</td>
                            <td>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#">INV-84990</a></td>
                            <td class="font-weight-600">Agung Ardiansyah</td>
                            <td>
                                <div class="badge badge-warning">Unpaid</div>
                            </td>
                            <td>July 22, 2018</td>
                            <td>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#">INV-87320</a></td>
                            <td class="font-weight-600">Ardian Rahardiansyah</td>
                            <td>
                                <div class="badge badge-success">Paid</div>
                            </td>
                            <td>July 28, 2018</td>
                            <td>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>