      <form action="/login" method="GET">
              <div class="d-flex flex-column flex-sm-row mx-4">
                <div class="input-group mb-3 col">
                  <input type="hidden" name="listbooks" value="reading-history">
                    <select class="form-control" name="history-books-filtering" onchange="this.form.submit()">
                      <option value="latest"  <?php echo !isset($history_books_filtering) || ( isset($history_books_filtering) && $history_books_filtering == 'monthly' ) ? 'selected' : ''?>>Monthly</option>
                      <option value="a-z" <?php echo isset($history_books_filtering) && $history_books_filtering == 'weekly' ? 'selected' : ''?>>Weekly</option>
                    </select>
                </div>
                <div class="col">
                  <div class="d-flex">
                    <input class="form-control mr-sm-2" type="date" placeholder="Date" name="reading-history-date" value="">
                    <button class="btn btn-outline-success my-sm-0" type="submit">Filter</button>
                  </div>
                </div>
              </div>
        </form> 
 <div class="table-responsive mx-0" >
  <table class="table table-striped">
    <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col" class="text-left">Book Name</th>
        <th scope="col" class="text-left">Author Name</th>
        <th scope="col"> Time </th>
      </tr>
    </thead>
    <tbody >
      <?php $i=0;
      $book = new Books;
      while($bok=mysqli_fetch_assoc($readBookss)):  
        $bid=$bok['bid'];
        $row=$book->fetchBook($bid);
        ?>
        <tr>
          <th class="text-center"><?=++$i?></th>
          <td><?=$row['book_name'] ?></td>
          <td><?=$row['author_name'] ?></td>
          <td class="text-center"><?=$bok['timestamp'] ?>
          </td> 
        </tr>
      <?php endwhile;
      ?>
    </tbody>
  </table>
  <?php  if($i==0):?>
   <h4 class="text-center mt-5 pt-5" style="color:#aaa;">No Books found!</h4>
 <?php endif; ?>
</div>   
