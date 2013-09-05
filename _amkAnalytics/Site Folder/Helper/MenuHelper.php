<?php
	
	class MenuHelper extends HtmlHelper{
		public function link($title, $url = null, $options = array(), $confirmMessage = false){
			if(!is_array($url))
				$tmp = Router::parse($url);
			else
				$tmp = $url;

			if($tmp['controller'] == $this->params['controller'] && $tmp['action'] == $this->params['action']){
				if(isset($options['class']))
					$options['class'] .= ' current-page';
				else
					$options['class'] = 'current-page';
			}

			return parent::link($title, $url, $options, $confirmMessage);
		}
	};
?>