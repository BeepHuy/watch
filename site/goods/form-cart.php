            <div class="form-checkout-group">
                                        <label for="email">Email <strong style="color: red;">*</strong></label>
                                        <input type="email" name="email" id="email" value="huy@gmail.com">
                                    </div>
                            </div>
                        </div>
                        <a href="/account/register.php" class="new-account">Tạo tài khoản mới?</a>
                    </div>
                    <div class="col l-5 m-12 c-12">
                            <div class="wrapper-your-bill">
                                    <div class="your-bill">
                                            <h3>Đơn hàng của bạn</h3>
                                            <table class="tb-your-bill">
                                                    <thead>
                                                            <tr>
                                                                    <th class="product-name-your-bill">Sản phẩm</th>
                                                                    <th class="product-total-your-bill">Tạm tính</th>
                                                                </tr>
                                                        </thead>
                                                    <tbody>

                                                            <tr class="cart-item">
                                                                    <td class="product-name-your-bill"> CONVERSE CHUCK
                            TAYLOR ALL START
                                                                            <strong class="product-quantity-your-bill">×
                                1 </strong>
                                                                            <input type="text" hidden name="quantity"
                                value="1">
                                                                        </td>
                                                                    <td class="product-total-your-bill">
                                                                            3.000.000 <span
                                style="text-decoration: underline;">đ</span>
                                                                        </td>
                                                                </tr>
                                                        </tbody>
                                                    <tfoot>
                                                            <tr class="cart-subtotal">
                                                                    <th>Tạm tính</th>
                                                                    <td class="product-total-your-bill">3.000.000<span
                                style="text-decoration: underline;">đ</span></td>
                                                                </tr>
                                                            <tr class="order-total">
                                                                    <th>Tổng</th>
                                                                    <td class="product-total-your-bill">3.000.000<span
                                style="text-decoration: underline;">đ</span></td>
                                                                </tr>
                                                        </tfoot>
                                                </table>
                                            <div class="btn-order">
                                                    <button type="submit" name="order_click">Đặt hàng</button>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer-wrapper">
            <?php require '../layout/footer.php'; ?>
        </footer>
</body>

</html>