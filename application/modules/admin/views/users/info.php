 <div class="card">
     <div class="card-header">
         <h3 class="card-title">User Details</h3>
     </div>
     <div class="card-body">
         <strong><i class="fas fa-book mr-1"></i> Account</strong>
         <p class="text-muted">
             <strong>Username</strong> : <?= $view['username'] ?>
         </p>
         <p class="text-muted">
             <strong>Fullname</strong> : <?= $view['fname'] ?> <?= $view['lname'] ?>
         </p>
         <p class="text-muted">
             <strong>Contact </strong> : <?= $view['contact_no'] ?>
         </p>
         <hr>
         <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
         <p class="text-muted"> <?= $view['address'] ?></p>
         <hr>

         <strong><i class="fas fa-pencil-alt mr-1"></i> Register IP Address</strong>

         <p class="text-muted">
             <span class="tag tag-danger"><?= $view['register_ip'] ?></span>
         </p><br>
         <!-- /.card-body -->
         <div class="row">
             <div class="col">
                 <a href="<?= base_url('users/') ?>" class="btn btn-primary">Back</a>
             </div>
         </div>
     </div>

 </div>