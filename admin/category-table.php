
              <?php 
                $sql_1 = "SELECT * FROM category order by id DESC";
                $cats = mysqli_query($conn,$sql_1);

               ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Trạng Thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($cats as $key => $cat) :?>
                  <tr>
                    <td><?php echo $key+1  ?></td>
                    <td>
                    <img src="../public/uploads/<?php echo $cat['image'] ?>" alt="" width="80px">
                    </td>
                    <td><?php echo $cat['name'] ?></td>
                    <td>
                        <?php if ($cat['status'] == 0) : ?>
                          <span class="label label-danger">Ẩn</span> 
                        <?php else: ?>
                          <span class="label label-success">Hiện</span> 
                        <?php endif ?>
                    </td>
                    <td>
                        <a href="category-edit.php?id=<?php echo $cat['id'] ?>" class="btn btn-sm btn-primary">
                          <i class="fa fa-edit"></i>
                        </a> 
                        <a href="category-delete.php?id=<?php echo $cat['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc không?')"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                        <?php endforeach; ?>
                </tbody>
              </table>
