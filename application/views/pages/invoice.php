<section class="content home">
    <div class="container-fluid">
        <?php if(isset($error)) : ?>
            <div class="alert alert-warning">
                <strong><?php echo $error; ?></strong>
            </div>
        <?php endif; ?>
        <div class="block-header">
            <h2>Dashboard</h2>
        </div>        
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <?php if(!empty($invoices)) : ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice Number</th>
                                        <th>Invoice Date</th>
                                        <th>Invoice Total Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $row_index = 1; ?>
                                    <?php foreach($invoices as $invoice) : ?>
                                        <tr>
                                            <td> <?php echo $row_index; ?> </td>
                                            <td> <?php echo $invoice->invoice_number; ?> </td>
                                            <td> <?php echo $invoice->invoice_date_emi; ?> </td>
                                            <td> <?php echo $invoice->invoice_total_value; ?> </td>
                                        </tr>
                                    <?php $row_index++; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else : ?>
                            <div class="alert alert-info">
                                Não há resultados a serem exibidos!
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo form_open_multipart('invoice/upload');?>

            <input type="file" name="invoice-files" size="100" accept="text/xml"/>

            <br /><br />

            <input type="submit" value="upload" />

            </form>

            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form action="invoice/upload" id="form-upload-files" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                        <div class="dz-message">
                            <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                            <h3>Clique aqui ou arraste os arquivos</h3>
                            <em>(Somente arquivos <strong>xml</strong> são permitidos.)</em>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <button class="btn btn-raised btn-info waves-effect">ENVIAR ARQUIVOS</button>
                    </div>
                </div>
            </div> -->
	</div>
</section>