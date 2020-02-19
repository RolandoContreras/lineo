 <?php $cart = count($this->cart->contents());
               if($cart > 0){ ?>
                    <div class="widget woocommerce widget_shopping_cart">
                        <div class=minicart_hover id=header-mini-cart>
                            <i class="fas fa-shopping-cart"></i>
                            <span class=cart-items-number>
                                <span class="wrapper-items-number"><span class="items-number" style="color:red !important"><?php echo $cart;?></span></span>
                          </span>
                        </div>
                            <div class="widget_shopping_cart_content" style="padding-top: 10px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
                              <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                  <?php foreach ($this->cart->contents() as $items): ?>
                                  <li class="woocommerce-mini-cart-item mini_cart_item">
                                    <a onclick="delete_order('<?php echo $items['rowid'];?>');" class="remove remove_from_cart_button">×</a>
                                    <a><img src="<?php echo site_url().'static/page_front/images/logo/favico/android-chrome-192x192.png';?>">  Curso de <?php echo $items['name'];?></a>
                                    <span class="quantity"><?php echo format_number_miles($this->cart->format_number($items['qty'])); ?> × <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol"></span>S/.<?php echo $this->cart->format_number($items['price']); ?></span>
                                    </span>
                                </li>
                                <?php endforeach;?>
                              </ul>
                              <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> 
                                  <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">S/.</span><?php echo $this->cart->format_number($this->cart->total());?></span>
                              </p>
                              <p class="woocommerce-mini-cart__buttons buttons">
                                  <a href="<?php echo site_url().'backoffice/pay_order';?>" class="button checkout wc-forward">Pagar</a>
                              </p>
                            </div>
                      </div>    
               <?php } ?>   