<?php

if (!isset($argv[1])) {
    echo "please provide a username!";
    exit();
}

$username  = $argv[1];

$ch  = curl_init("https://api.github.com/users/$username/events?per_page=2");
curl_setopt($ch, CURLOPT_USERAGENT, "F4enN");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$head = curl_exec($ch);
$httpCode = curl_getinfo($ch)['http_code'];


if ($httpCode !== 200) {
    echo "user not found";
    exit();
}

$data = json_decode($head, true);

if (empty($data)) {
    echo "There is no recent activities for this user";
    exit();
}

foreach ($data as $v) {
    if ($v['type'] === 'PushEvent') {
        $msg = $v['payload']['commits'][0]['message'];
        $repo_name = $v['repo']['name'];
        $url = $v['repo']['url'];
        $time = date('F j, Y ,H:i', strtotime($v['created_at']));
        echo "\e[92mRecent Activity:\e[0m \n";
        echo "-----------------------------------\n";
        echo "\e[36mRepo:\e[0m $repo_name\n";
        echo "\e[36mRepo API URL:\e[0m $url\n";
        echo "\e[36mLast commit:\e[0m $msg\n";
        echo "\e[36mCreated at:\e[0m $time";
        return;
    } elseif ($v['type'] === 'IssueCommentEvent') {
        $repo_name = $v['repo']['name'];
        $url = $v['repo']['url'];
        $issue_name = $v['payload']['issue']['title'];
        $issue_url = $v['payload']['issue']['html_url'];
        $issue_author = $v['payload']['issue']['user']['html_url'];
        echo "\e[92mRecent Activity:\e[0m \n";
        echo "-----------------------------------\n";
        echo "\e[36mRepo:\e[0m $repo_name\n";
        echo "\e[36mRepo API URL:\e[0m $url\n";
        echo "\e[36mIssue title:\e[0m $issue_name\n";
        echo "\e[36mIssue URL: \e[0m $issue_url\n";
        echo "\e[36mIssue Author: \e[0m $issue_author\n";
        return;
    }
}
curl_close($ch);
