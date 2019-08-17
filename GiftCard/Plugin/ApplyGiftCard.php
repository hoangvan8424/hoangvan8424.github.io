<?php
namespace Mageplaza\GiftCard\Plugin;

class ApplyGiftCard
{
    public function afterGetCouponCode(\Magento\Checkout\Block\Cart\Coupon $subject, $result)
    {
        if($result == null) {
            if(isset($_SESSION['giftcard']['couponCode'])) {
                $couponCode = $_SESSION['giftcard']['couponCode'];
                if($couponCode!=null) return $couponCode;
                else return $result;
            }
            else return $result;
        }
        return $result;

    }
}