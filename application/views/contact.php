<div id="contact-page">
    <div id="border-bar">
        <div id="header-bar">
        </div>
        <div id="sendto">
            <p>Send to</p>
                <?=form_dropdown('input-recipient', $userlist); ?>
        </div>
        <div id="contact-text-box">

            <?=form_open('contact/do_add_messages'); ?>
            <?=form_input ($form['content']); ?>
                    <!-- <textarea  rows="10" cols="50" name="content"> </textarea> -->
                    <br>
            <?=form_submit (null, 'Send');?>
            <?=form_close (); ?>
            <textarea placeholder="Write your message here..."></textarea>
            <button id="sendmessage">Send</button>
        </div>
    </div>
    <div id="right-side">
        <div id="top-bar">
        </div>
    <h1>Messages</h1>
    <div id="message">

        <?php foreach($messages->result_array() as $post) : ?>
          <h3><?php echo $post['msg_content'];?></h3>

        <br/>
          <br><br><br>
        <?php endforeach; ?>


    </div>
        <i class="fa fa-reply" aria-hidden="true"></i>
        <i class="fa fa-trash" aria-hidden="true"></i>
    </div>
</div>
