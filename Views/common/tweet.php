
<div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=<?php echo $view_tweet['user_id']; ?>">
                            <img src="<?php echo buildImagePath($view_tweet['user_image_name'],'user'); ?>" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=<?php echo $view_tweet['user_id']; ?>">
                                <span class="nickname"><?php echo $view_tweet['user_nickname']; ?></span>
                                <span class="user-name">@<?php echo $view_tweet['user_name']; ?> ・<?php echo convertToDayTimeAgo($view_tweet['tweet_created_at']); ?></span>
                            </a>
                        </div>
                        <p><?php echo $view_tweet['tweet_body']; ?></p>

                        <?php if (isset($view_tweet['tweet_image_name'])) : ?>
                        <img src="<?php echo buildImagePath($view_tweet['tweet_image_name'],'tweet'); ?>" alt="" class="post-image">
                        <?php endif; ?>

                        <div class="icon-list">
                            <div class="like">
                                <?php if ($view_tweet['like_id']){
                                    //いいね！している場合は青のハートを表示
                                    echo  '<img src="' . HOME_URL . 'Views/img/icon-heart-twitterblue.svg"  alt="">';
                                }else {
                                    //いいね！をしていない場合は灰色のハートを表示
                                     echo  '<img src="' . HOME_URL . 'Views/img/icon-heart.svg"  alt="">' ;
                                } ?>
                                    
                            </div>
                            <div class="like-count"><?php echo($view_tweet['like_count']) ?></div>
                        </div>
                    </div>
                </div>
 