<? include "config.inc";

if (($setcookies==true) && (isset($abspeichern)) && ($abspeichern=="ja")) {
  setcookie("cookie_name",stripslashes($name),time()+(3600*24*90));
  setcookie("cookie_email",$email,time()+(3600*24*90));
} 
if ((isset($post_server)) && ($post_server!=""))
  $server=$post_server;
if ((isset($post_port)) && ($post_port!=""))
  $port=$post_port;
?>

<? include "head_article.inc"; ?>


<?php require("$file_newsportal");

if ($setcookies) {
  if ((isset($cookie_name)) && (!isset($name))) $name=$cookie_name;
  if ((isset($cookie_email)) && (!isset($email))) $email=$cookie_email;
}


if (!isset($references)) {
  $references=false;
}

if (!isset($type)) {
  $type="new";
}

if ($type=="new") {
  $subject="";
  $bodyzeile="";
  $show=1;
}

if (!isset($group)) $group=$newsgroups;

if ($type=="post") {
  $show=0;
  if (trim($body)=="") {
    $type="retry";
    $error=$text_post["missing_message"];
  }
  if (trim($email)=="") {
    $type="retry";
    $error=$text_post["missing_email"];
  }
  if (!validate_email(trim($email))) {
    $type="retry";
    $error=$text_post["error_wrong_email"];
  }
  if (trim($name)=="") {
    $type="retry";
    $error=$text_post["missing_name"];
  }
  if (trim($subject)=="") {
    $type="retry";
    $error=$text_post["missing_subject"];
  }
  if ($type=="post") {
    if (!$readonly) {
      $message=verschicken(quoted_printable_encode(stripslashes($subject)),
                 $email." (".quoted_printable_encode($name).")",
                 $newsgroups,$references,$body);
      if (substr($message,0,3)=="240") {
?>

<h1 align="center"><? echo $text_post["message_posted"];?></h1>

<p><? echo $text_post["message_posted2"];?></p>

<p><a href="<? echo $file_thread.'?group='.urlencode($group).'">'.$text_post["button_back"].'</a> '
     .$text_post["button_back2"].' '.urlencode($group) ?></p>
<?
      } else {
        $type="retry";
        $error=$text_post["error_newsserver"]."<br /><pre>$message</pre>";
      }
    } else {
      echo $text_post["error_readonly"];
    }
  }
}

if ($type=="reply") {
//  $ns=OpenNNTPconnection($server,$port);
  $message=read_message($id,0,$group);
  $head=$message->header;
  $body=explode("\n",$message->body[0]);
  closeNNTPconnection($ns);
  if ($head->name != "") {
    $bodyzeile=$head->name;
  } else {
    $bodyzeile=$head->from;
  }
  $bodyzeile=$bodyzeile." wrote:\n\n";
  for ($i=0; $i<=count($body)-1; $i++) {
    if (trim($body[$i])!="") {
      $bodyzeile=$bodyzeile."> ".$body[$i]."\n";
    } else {
      $bodyzeile.="\n";
    }
  }
//  $bodyzeile.=eregi_replace("\n","\n> ",$body);
//  $bodyzeile.="> ".str_replace("\n","\n> ",$body);
  $subject=$head->subject;
  if (isset($head->followup) && ($head->followup != "")) {
    $newsgroups=$head->followup;
  } else {
    $newsgroups=$head->newsgroups;
  }
  splitSubject($subject);
  $subject="Re: ".$subject;
  $show=1;
  $references=false;
  if (isset($head->references[0])) {
    for ($i=0; $i<=count($head->references)-1; $i++) {
      $references .= $head->references[$i]." ";
    }
  }
  $references .= $head->id;
}

if ($type=="retry") {
  $show=1;
  $bodyzeile=$body;
}

if ($show==1) {

if ($testgroup) {
  $testnewsgroups=testgroups($newsgroups);
} else {
  $testnewsgroups=$newsgroups;
}

if ($testnewsgroups == "") {
  echo $text_post["followup_not_allowed"];
  echo " ".$newsgroups;
} else {
  $newsgroups=$testnewsgroups;

  echo '<h1 align="center">'.$text_post["group_head"].$newsgroups
    .$text_post["group_tail"].'</h1>';

  if (isset($error)) echo "<p>$error</p>"; ?>

<br />

<form action="<? echo $file_post?>" method="post">

<table>
<tr><td align="right"><b><? echo $text_header["subject"] ?></b></td>
<td><input type="text" name="subject" value="<? echo htmlentities(stripslashes($subject));?>" size="40" maxlength="80" /></td></tr>
<tr><td align="right"><b>Name:</b></td>
 <td align="left"><input type="text" name="name"
 <? if (isset($name)) echo 'value="'.
  htmlentities(stripslashes($name)).'"'; ?>
 size="40" maxlength="40" /></td></tr>
<tr><td align="right"><b>eMail:</b></td>
 <td align="left"><input type="text" name="email"
 <? if (isset($email)) echo "value=\"$email\""; ?>
 size="40" maxlength="40" /></td></tr>
</table>

<br />

<table>
<tr><td><b><? echo $text_post["message"];?></b><br />
<textarea name="body" rows="20" cols="79" wrap="physical">
<? if (isset($bodyzeile)) echo stripslashes($bodyzeile); ?>
</textarea></td></tr>
<tr><td>
<input type="submit" value="<? echo $text_post["button_post"];?>" />
<? if ($setcookies==true) { ?>
<input type="checkbox" name="abspeichern" value="ja" />
<? echo $text_post["remember"];?>
<? } ?>
</td>
</tr>
</table>
<input type="hidden" name="type" value="post" />
<input type="hidden" name="newsgroups" value="<? echo $newsgroups; ?>" />
<input type="hidden" name="references" value="<? echo htmlentities($references); ?>" />
<input type="hidden" name="group" value="<? echo $group; ?>" />
</form>

<? } } ?>

<? include "tail_article.inc"; ?>