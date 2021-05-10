     <div class="position-relative offset-lg-4 mt-5 mt-lg-0 pt-md-0 mt-md-5 pt-2" style="top:-45px">
       <form accept="/" method="GET">
         <div class="d-flex flex-column flex-sm-row mx-4">
           <div class="input-group mb-3 col">
             <select class="form-control" name="books-sorting" onchange="this.form.submit()">
               <option value="latest" <?php echo !isset($books_sorting) || (isset($books_sorting) && $books_sorting == 'latest') ? 'selected' : '' ?>>Latest</option>
               <option value="a-z" <?php echo isset($books_sorting) && $books_sorting == 'a-z' ? 'selected' : '' ?>>Ascending</option>
               <option value="z-a" <?php echo isset($books_sorting) && $books_sorting == 'z-a' ? 'selected' : '' ?>>Descending</option>
             </select>
           </div>
           <div class="col">
             <div class="d-flex">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="q" value="<?= $q ?>">
               <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>
             </div>
           </div>
         </div>
       </form>
     </div>
     <div class='row mt-2 mt-md-5 position-relative' style="top:-45px;">
       <?php $i = 0;
        while ($row = mysqli_fetch_assoc($rows)) :
          $i++;
        ?>
         <div class="col-lg-6 col-md-6 col-sm-6 col-9 mx-auto card-group <?php echo $_SESSION['type'] == 'inreader' ? 'col-xl-4' : ''; ?>">
           <div class="card flex-md-row mb-4 bg-dark text-white">
             <?php $fetch = '../../resources/uploads/' . $row['cover_image_name'] . ".jpg";
              $bid = $row['bid'];
              $uid = $_SESSION['uid'];
              
              ?>
             <div class="align-self-center m-2">
               <img class='' style="height: 255px; width: 170px;" height=255 width=170 <?= "src='{$fetch}'"; ?> alt='Book Cover'>
             </div>
             <div class="card-body d-flex flex-column text-md-left text-center">
               <h4 class="mb-0">
                 <strong class="d-inline-block mb-2"><?= $row['book_name'] ?></strong>
               </h4>
               <div class="text-white-50"><?= $row['description'] ?></div>
               <div class="mb-1 text-info">by <?= $row['author_name'] ?></div>
               <div class="mb-1"><?= $row['count'] ?></div>
               
               <div class="card-text mb-auto">
                 <div class="row">
                   <?php
                    $booksRead = $user->fetchBooks($uid);
                    $ch = $booksRead->fetch_all();
                    $check = null;
                    foreach ($ch as $val) {
                      if (in_array($bid, $val)) {
                        $check = 'checked';
                      }
                    }
                    if (!$check) :
                    ?>
                     <a <?= "href='/readbook?bid={$bid}'" ?> class='mx-auto badge badge-light badge-pill p-2 text-muted <?php echo $row['count'] <= 0 || $user->fetchBooks($uid)->num_rows > 0 ? 'd-none' : '' ?>' style="font-size: 0.9rem;" title='mark as read'><i class="fa fa-book-reader"></i> Issue</a>
                   <?php else :  $lnk = '/readbook?dbid=' . $bid; ?>

                     <a class='mx-auto badge badge-primary badge-pill p-2' href="<?= $lnk ?>" title='Uncheck from read list' style="font-size: 0.9rem;">Issued <i class="fa fa-times"></i></a>
                   <?php endif; ?>
                   <?php
                    $booksFinished = $user->fetchBooks($uid, 'finish');
                    $ch = $booksFinished->fetch_all();
                    $read_check = null;
                    foreach ($ch as $val) {
                      if (in_array($bid, $val)) {
                        $read_check = 'read_checked';
                      }
                    }
                    if (!$read_check) :
                    ?>
                     <a <?= "href='/finishbook?bid={$bid}'" ?> class='mx-auto badge badge-light badge-pill p-2 text-muted' style="font-size: 0.9rem;" title='mark as read'><i class="fa fa-check"></i> Finish</a>
                   <?php else :  $lnk = '/finishbook?dbid=' . $bid; ?>

                     <a class='mx-auto badge badge-success badge-pill p-2' href="<?= $lnk ?>" title='Uncheck from read list' style="font-size: 0.9rem;">Finished <i class="fa fa-times"></i></a>
                   <?php endif; ?>
                 </div>
                 <div class="row">
                   <?php if ($_SESSION['type'] == 'inadmin') : ?>
                     <a <?= "href='/editbook?bid={$bid}'" ?> class='text-primary text-center col' title='edit this book'><i class="fa fa-edit"></i> </a>
                     <a href='javascript:void(0)' class="text-danger text-center col" data-toggle="modal" data-target="#deleteBookModal" data-bname="<?= $row['book_name'] ?>" title='this is book' data-bid="<?= $bid ?>"> <i class="far fa-trash-alt"> </i></a>
                   <?php endif; ?>
                   <?php $booksLiked = $user->fetchBooks($uid, 'like');
                    $ch = $booksLiked->fetch_all();
                    $like_check = null;
                    foreach ($ch as $val) {
                      if (in_array($bid, $val)) {
                        $like_check = 'read_checked';
                      }
                    }
                    ?>
                   <a <?php echo  $like_check ? "href='/likebook?dbid={$bid}'" : "href='/likebook?bid={$bid}'" ?> class="text-danger text-center col" title='this is book'> <i class="<?php echo $like_check ? 'fas fa-heart' : 'far fa-heart' ?>"> </i></a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       <?php
        endwhile;
        if ($i == 0) : ?>
         <h4 class="mx-auto mt-5 pt-5" style="color:#aaa;">No Books Found</h4>
       <?php endif; ?>
     </div>
     <?php if (!isset($bookIds) && $i != 0) : ?>
       <div class="row col-4 offset-8 py-3">
         <nav aria-label="Page navigation example">
           <ul class="pagination">
            

             <?php
              if (($offset - $limit) >= 0) :
                $offset1 = $offset - $limit;
              ?>
               <li class="page-item"><a class="page-link show previous result" href="/login?view=books&offset=<?= $offset1 ?>">Previous</a></li>
             <?php endif; ?>
             <?php if (($offset + $limit) < $total) :
                $offset2 = $offset + $limit;
              ?>
               <li class="page-item"><a class="page-link show next results" href="/login?view=books&offset=<?= $offset2 ?>">Next</a></li>

             <?php endif; ?>
           </ul>
         </nav>
       </div>
     <?php endif; ?>

     <?php require __dir__ . '/' . '../../Views/books/addBook_form.view.php'; ?>
     </div>
     </div>
     <style>
       @media only screen and (max-width: 575px) {
         #btn-addBook {
           margin-top: 125px;
           margin-left: 45px;
           width: 81%;
         }
       }
     </style>