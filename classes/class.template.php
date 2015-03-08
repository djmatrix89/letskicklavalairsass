<?php
class template
{
	private $file		= NULL;
	private $content	= NULL;	
	private $tags		= array();
	private $count		= 0;		
	public function fread($archive)
	{
		$this->file = @fopen($archive, "r");
		$this->content = @fread($this->file, filesize($archive));
		if(!$this->file) exit("Error open: {$archive}");
		if(!$this->content) exit("Error read: {$archive}");
	}
	public function set($name, $value)
	{
		$this->tags[$this->count++] = array("name" => $name, "value" => $value);
	}
	public function show()
	{
		foreach($this->tags as $tags)
			$this->content = str_replace("{".$tags['name']."}", $tags['value'], $this->content);
			
		eval("?>".$this->content."<?");
	}
}

?>