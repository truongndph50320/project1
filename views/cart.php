<?php
require_once "./views/layout/header.php";
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

<section class="product-title py-3 bg-light">
    <div class="container">
        <h1 class="text-center">Giỏ hàng</h1>
    </div>
</section>

<section class="component my-4">
    <div class="container">
        <div class="row">
            <!-- Bảng giỏ hàng -->
            <div class="col-lg-8 mb-4">
                <form action="?act=deleteSelectedProducts" method="post">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Thao tác</th>
                                    <th scope="col">Thông tin sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Còn lại</th>
                                    <th scope="col">Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($viewCarts as $cart): ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="selectedItems[]" value="<?= $cart['id'] ?>">
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <img src="admin/<?= $cart['image_url'] ?>" alt="Product Image" class="img-thumbnail me-2" style="width: 70px; height: 70px;">
                                            <a href="<?= '?act=chi-tiet-san-pham&id=' . $cart['id']; ?>"><?= $cart['name'] ?></a>
                                        </td>
                                        <td>
                                            <?= number_format($cart['price']) ?>đ
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <button type="button" class="btn btn-outline-secondary decre" data-id="<?= $cart['id'] ?>">-</button>
                                                <input type="text" value="<?= $cart['so_luong_gio_hang'] ?>" class="form-control text-center quantity-input" data-id="<?= $cart['id'] ?>" max="<?= $cart['so_luong_san_pham'] ?>">
                                                <button type="button" class="btn btn-outline-secondary incre" data-id="<?= $cart['id'] ?>">+</button>
                                            </div>
                                        </td>
                                        <td><?= $cart['so_luong_san_pham'] ?> sản phẩm</td>
                                        <td><?= number_format($cart['so_luong_gio_hang'] * $cart['price']) ?>đ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-danger">Xóa sản phẩm đã chọn</button>
                        <a href="<?= BASE_URL . '?act=/' ?>" class="btn btn-secondary">Tiếp tục mua hàng</a>
                    </div>
                </form>
            </div>
            <!-- Tóm tắt đơn hàng -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Tóm tắt đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span>Tạm tính</span>
                            <span><?= is_numeric($total) ? number_format($total) : 0 ?>đ</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Tổng</strong>
                            <strong id="total-cart"><?= is_numeric($total) ? number_format($total) : 0 ?>đ</strong>
                        </div>
                        <a href="<?= BASE_URL . '?act=pay' ?>" class="btn btn-success w-100 mt-3">Thanh toán ngay</a>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>Chúng tôi chấp nhận thanh toán</p>
                    <img src="./public/img/visa.png" alt="Visa" class="img-fluid mx-1" style="width: 50px;">
                    <img src="./public/img/amex.png" alt="Amex" class="img-fluid mx-1" style="width: 50px;">
                    <img src="./public/img/discover.png" alt="Discover" class="img-fluid mx-1" style="width: 50px;">
                    <img src="./public/img/mastercard.png" alt="Mastercard" class="img-fluid mx-1" style="width: 50px;">
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once "./views/layout/footer.php";
?>

<script src="./public/js/cart.js"></script>
<script>
     document.addEventListener("DOMContentLoaded", () => {
          // Xử lý sự kiện khi nhấn nút tăng
          document.querySelectorAll(".incre").forEach((button) => {
               button.addEventListener("click", () => {
                    const id = button.dataset.id;
                    updateQuantity(id, 1); // Tăng số lượng
               });
          });

          // Xử lý sự kiện khi nhấn nút giảm
          document.querySelectorAll(".decre").forEach((button) => {
               button.addEventListener("click", () => {
                    const id = button.dataset.id;
                    updateQuantity(id, -1); // Giảm số lượng
               });
          });

          // Hàm gửi yêu cầu AJAX để cập nhật số lượng
          function updateQuantity(cartId, change) {
               fetch("<?= BASE_URL . '?act=updateQuantity' ?>", {
                    method: "POST",
                    headers: {
                         "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                         cartId,
                         change
                    }),
               })
               .then((response) => response.json())
               .then((data) => {
                         if (data.success) {
                              const quantityInput = document.querySelector(`.quantity-input[data-id="${cartId}"]`);
                              const priceElement = document.querySelector(`.price[data-id="${cartId}"]`);
                              const totalElement = document.querySelector(`.total[data-id="${cartId}"]`);
                              quantityInput.value = data.newQuantity;
                              totalElement.textContent = `${data.newTotalPrice}đ`;

                              // Cập nhật tổng giỏ hàng
                              const totalCartElement = document.getElementById("total-cart");
                              totalCartElement.textContent = `${data.cartTotal}đ`;
                         } else {
                              alert(data.message || "Cập nhật thất bại");
                         }
                    })
                    .catch((error) => {
                         console.error("Error:", error);
                    });
          }
     });
</script>
