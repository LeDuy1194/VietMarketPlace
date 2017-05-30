<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use App\Models\User;


class PaymentController extends Controller
{
    private $apiContext;
    public function __construct() {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $payment_id = Session::get('payment_id');
        Session::forget('payment_id');

        $user_name = Session::get('user_name');
        Session::forget('user_name');

        $user_id = Session::get('user_id');
        Session::forget('user_id');

//        dd($request->all());
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        $payment = Payment::get($payment_id, $this->apiContext);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() == 'approved') {
                $user = User::find($user_id);
                $user->level = 1;
                $user->save();
                return redirect()->route('profile', $user_name)
                    ->with(['flash_level'=>'success message-custom','flash_message'=>'Tài khoản của bạn đã được nâng lên VIP']);
            }
            return redirect()->route('profile', $user_name)
                ->with(['flash_level'=>'danger message-custom','flash_message'=>'Nâng cấp tài khoản lỗi, bạn vui lòng kiểm tra lại thông tin chính xác!']);
//            dd($result);
        } catch (Exception $e) {
            return redirect()->route('profile', $user_name)
                ->with(['flash_level'=>'danger message-custom','flash_message'=>'Nâng cấp tài khoản lỗi, bạn vui lòng kiểm tra lại thông tin chính xác!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($this->apiContext);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
// ### Itemized information
// (Optional) Lets you specify item wise
// information
        $item1 = new Item();
        $item1->setName('Upgrade VIP user')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(10);
        $itemList = new ItemList();
        $itemList->setItems(array($item1));
// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(10);
// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(10)
            ->setDetails($details);
// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
// ### Redirect urls
// Set the urls that the buyer must be redirected to after
// payment approval/ cancellation.
//        $baseUrl = getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.create'))
            ->setCancelUrl(route('payment.create'));
// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
// For Sample Purposes Only.

// ### Create Payment
// Create a payment by calling the 'create' method
// passing it a valid apiContext.
// (See bootstrap.php for more on `ApiContext`)
// The return object contains the state and the
// url to which the buyer must be redirected to
// for payment approval
        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            echo "Faild";
            exit(1);
        }
// ### Get redirect url
// The API response provides the url that you must redirect
// the buyer to. Retrieve the url from the $payment->getApprovalLink()
// method
        $approvalUrl = $payment->getApprovalLink();
// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
//        echo"<pre>";
//        return $payment;

        Session::put('payment_id', $payment->id);
        Session::put('user_name', Auth::user()->username);
        Session::put('user_id', Auth::id());
        return redirect()->to($approvalUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
