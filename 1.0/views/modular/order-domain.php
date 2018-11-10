<?php 

//pcsdistribusi.co.id 
session_start();

$domain = $message = $session = NULL;
$session = $_SESSION;

// get token domain whois from domainesia
function get_tokend() {
    $tokend;
    // formula
    // meetYou="
    $url = 'https://www.domainesia.com/';
    $curl = curlf($url);
    $tokend = ambilkata($curl,'meetYou="','"');

    if (isset($tokend)) {
        $_SESSION['tokend'] = $tokend;
        return $tokend; 
    }
}
// debug('startoken'.HR);
// $to = get_tokend();
// debug($to,1);

// Curl target and get status domain avail or not
function check_domain($domain,$get_newtokend = FALSE) {
    
    if (! isset($domain)) debug('parameter domain required in method check_domain',1);

    $session = $_SESSION;
    // $tokend = '3589fcd5332917583d3774e89282d09d';
    if ($get_newtokend) $tokend = get_tokend();
    else if (isset($session['tokend'])) $tokend = $session['tokend'];

    $url = 'https://www.domainesia.com/whois?t='.$tokend.'&domain='.$domain;
    // debug($url);
    $return = curlf($url);

    if (isset($return)) {
        $return = json_decode($return,1);
        if (isset($return['status']) && $return['status'] == '403') {
            // error tokend timeout
            return check_domain($domain,TRUE);
        } else {

        }
    } 

    return $return;

}

//action
if ($_POST) 
{
    $post;
    $post = $_POST;
    if (isset($post['btn_submit'])) {
        //do curl 
        // $tokend = get_tokend();
        // debug($tokend,1);
        $check = check_domain($post['f_domain']);
        // debug($check,1);
        // if (isset($check)) $check = json_decode($check,1);
        if (isset($check['availability']) && $check['availability'] == 'available') {
            // avail
            $message = 'domain available';
            $message = print_message($message,'info');
        } else if ($check['availability'] == 'taken') {
            // no avail
            $message = 'domain not available';
            $message = print_message($message,'error');
        }  else {
            // no avail
            $message = 'Error occurred';
            $message = print_message($message,'error');
        } 
        // debug($check);
    }
}
?>

<?php 
$this->loadView('templates.general.layout_header');
?>
<div class="col-sm-12">
    <h2>Order Domain</h2><br/>

    <?php if (isset($message)) echo $message; ?>

    <form method="post">
        <div class="col-sm-12">
            Please input your domain<br/>
            <input name="f_domain" class="input br wdtFul" value="<?php if (isset($_POST['f_domain'])) echo $_POST['f_domain']; ?>" required />

            <input type="submit" name="btn_submit" value="Check" class="btn btn-success btn-sm" />
        </div>
    </form>
</div>
<?php 
$this->loadView('templates.general.layout_footer');
?>