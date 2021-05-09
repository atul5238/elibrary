<div class="position-relative offset-lg-10  text-center mt-5 mt-lg-0 pt-md-0 mt-md-5 pt-2" style="top:-45px">
<h2>Admin <a href='#' data-toggle="modal" data-target="#addAdminModal" id='btn-addAdmin'><i class="fas fa-user-plus text-secondary h4"></i></a></h2>
</div>
 <form accept="/" method="POST">
          <div class="table-responsive position-relative">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th scope="col">#</th>
                  <th scope="col" class="text-left">Full Name</th>
                  <th scope="col">Account Created</th>
                  <th scope="col">Type</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
               <?php
               $i=0+$offset;
               while($row=mysqli_fetch_assoc($rows)):
                if($row['uid']!=$_SESSION['uid']):
                  ?>
                  <tr>
                    <th class="text-center"><?=++$i?></th>
                    <td><?=$row['user_name'] ?></td>
                    <td class="text-center"><?=$row['last_login'] ?></td>
                    <td class="text-center"><?php echo $row['type']=='0'? 'Admin' : 'Reader' ?></td>
                    <td class="text-center">
                       <a href='javascript:void(0)' class="text-danger" data-toggle="modal" data-target="#deleteUserModal" data-uname="<?=$row['user_name']?>" data-uid="<?=$row['uid']?>"><?php  echo "<i class='fa fa-trash-alt'></i>";?></a>
                    </td> 
                  </tr>
                  <?php
                endif;
              endwhile;
              ?>  
            </tbody>
          </table>
        </div>
        <div> <?php if($i==0)
              echo "<h4 class='text-muted text-center'>No Records Found</h4>";?></div>
        <div class="row col-6 offset-6">
          <?php 
          if(($i-$limit)>0):
            $offset1=$offset-$limit;
            ?><a href="/login?offset=<?=$offset1 ?>" class='col text-center ml-5 form-control'>Previous</a><?php endif;?>
            <?php  if(($i+1)<$total):
              $offset2=$offset+$limit;
              ?><a href="/login?offset=<?=$offset2?>" class='form-control text-center mr-5 col '>Next</a>
            <?php endif;?>
          </div>
        </form>
      </div>
    </div>
    <?php require __dir__ . '/' . '../../Views/users/addAdmin_form.view.php'; ?>