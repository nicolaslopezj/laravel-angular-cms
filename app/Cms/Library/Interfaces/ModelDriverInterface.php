<?php namespace Cms\Library\Interfaces;

interface ModelDriverInterface {

	public function index($page = 1);

	public function get($id);

	public function store($data);

	public function update($id, $data);

	public function delete($id);

}