<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $product;
    protected $amount;
    protected $quantity;
    protected $flavor;
    protected $price;
    protected $reservationDate;
    protected $finalDate;

    /**
     * Create a new message instance.
     *
     * @param string $customerName
     * @param string $productName
     * @param int $amount
     * @param int $quantity
     * @param string $flavor
     * @param string $date
     */
    public function __construct($name, $product, $amount, $quantity, $flavor, $price, $reservationDate, $finalDate)
    {
        $this->name = $name;
        $this->product = $product;
        $this->amount = $amount;
        $this->quantity = $quantity;
        $this->flavor = $flavor;
        $this->price =  $price;
        $this->reservation = $reservationDate;
        $this->finish = $finalDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('success')
            ->subject('Payment Successful')
            ->to("layeredbyingrid2021@gmail.com"); // Update this line with the correct email address
    }
}
