<?php
if (false) {

    class XFCP_ThemeHouse_GoToFirstUnrea_Extend_XenForo_ControllerPublic_Post extends XenForo_ControllerPublic_Post
    {
    }
}

class ThemeHouse_GoToFirstUnrea_Extend_XenForo_ControllerPublic_Post extends XFCP_ThemeHouse_GoToFirstUnrea_Extend_XenForo_ControllerPublic_Post
{

    public function actionUnread()
    {
        $visitorUserId = XenForo_Visitor::getUserId();
        $postId = $this->_input->filterSingle('post_id', XenForo_Input::UINT);
        
        $ftpHelper = $this->getHelper('ForumThreadPost');
        list($post, $thread, $forum) = $ftpHelper->assertPostValidAndViewable($postId);
        
        if (!$visitorUserId) {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL, 
                XenForo_Link::buildPublicLink('posts', $post));
        }
        
        return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT, 
            XenForo_Link::buildPublicLink('threads/unread', $thread));
    }
}