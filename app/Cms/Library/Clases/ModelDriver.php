<?php namespace Cms\Library\Clases;

use Cms\Library\Interfaces\ModelDriverInterface;

Class ModelDriver implements ModelDriverInterface {

	public function query() {
		$class = $this->model;
		$query = $class::where('id', '>', '0');
		return $query;
	}

	public function getColumns() {
		$class = new $this->model;
		$columns = $class->columns;

		if (!$columns) {
			return [];
		}

		return $columns;
	}

	public function filterQuery($options, $query) {
		$query = $this->filterFields($options, $query);
		$query = $this->filterWhere($options, $query);
		$query = $this->filterOrderBy($options, $query);

		return $query;
	}

	public function filterFields($options, $query) {
		if (!$options) {
			return $query;
		}

		if (!array_key_exists('fields', $options)) {
			return $query;
		}

		$fields = explode(',', $options['fields']);

		$query->select('id', 'slug');

		foreach ($fields as $index => $field) {
			if (in_array($field, $this->getColumns()) && 
				$field != 'id' && 
				$field != 'slug') {
				$query = $query->addSelect($field);
			}
		}

		return $query;
	}

	public function filterOrderBy($options, $query) {
		if (!$options) {
			return $query;
		}

		if (!array_key_exists('order_by', $options)) {
			return $query->orderBy('created_at', 'desc');
		}

		$order_by_parts = explode(',', $options['order_by']);
		$order_desc_parts = explode(',', $options['order_desc']);

		for ($i = 0; $i < count($order_by_parts); $i++) {
			$order_by = $order_by_parts[$i];
			$order_desc = $order_desc_parts[$i] == 'desc' || $order_desc_parts[$i] == 'true' || $order_desc_parts[$i] == '1' || $order_desc_parts[$i] === true;

			if (in_array($order_by, $this->getColumns())) {
				if ($order_desc) {
					$query = $query->orderBy($order_by, 'desc');
				} else {
					$query = $query->orderBy($order_by);
				}
			}
		}

		return $query;
	}

	public function filterWhere($options, $query) {
		if (!$options) {
			return $query;
		}
		foreach ($options as $key => $value) {
			if (in_array($key, $this->getColumns())) {
				$re = "/[a-z_]+\\|/"; 
				preg_match_all($re, $value, $matches);

				if (count($matches[0]) != 1) {
					$value = str_replace('\|', '|', $value);
					$query = $query->where($key, '=', $value);
				} else {
					$operator = str_replace('|', '', $matches[0][0]);
					$condition = str_replace($matches[0][0], '', $value);
					$query = $this->conditionToQuery($query, $key, $operator, $condition);
				}
			}
		}

		return $query;
	}

	private function conditionToQuery($query, $key, $operator, $value) {
		if ($operator == 'equals') {
			return $query->where($key, '=', $value);
		}

		if ($operator == 'is_not_equal') {
			return $query->where($key, '!=', $value);
		}

		if ($operator == 'starts_with') {
			return $query->where($key, 'like', $value . '%');
		}

		if ($operator == 'ends_with') {
			return $query->where($key, 'like', '%' . $value);
		}

		if ($operator == 'contains') {
			return $query->where($key, 'like', '%' . $value . '%');
		}

		if ($operator == 'is_bigger_than') {
			return $query->where($key, '>', $value);
		}

		if ($operator == 'is_equal_or_bigger_than') {
			return $query->where($key, '>=', $value);
		}

		if ($operator == 'is_smaller_than') {
			return $query->where($key, '<', $value);
		}

		if ($operator == 'is_equal_or_smaller_than') {
			return $query->where($key, '<=', $value);
		}

		return $query;
	}

	public function all($options = null) {
		$query = $this->query();
		$query = $this->filterQuery($options, $query);
		return $query->get();
	}

	public function index($page = 1, $per_page = 20, $options = null) {
		$query = $this->query();
		$query = $this->filterQuery($options, $query);
		return $query->paginate($per_page);
	}

	public function get($id) {
		$class = $this->model;
		return $class::findOrFail($id);
	}

	public function first($options) {
		$query = $this->query();
		$query = $this->filterQuery($options, $query);
		return $query->first();
	}

	public function store($data) {
		$model = new $this->model;
		
		$model->fill($data);
		$model->isValid('creating', true);
		$model->save();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.created', $model);
		}
		
		return $model;
	}

	public function update($id, $data) {
		$model = $this->get($id);

		$model->fill($data);
		$model->isValid('updating', true);
		$model->save();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.updated', $model);
		}

		return $model;
	}

	public function delete($id) {
		$model = $this->get($id);

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.deleted', $model);
		}

		$model->delete();
	}

}