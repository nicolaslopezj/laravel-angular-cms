<?php namespace Cms\Packages\Source\Comments\Controllers\Admin;

use Carbon\Carbon;
use Cms\Admin\Controllers\BaseController;
use Cms\Packages\Source\Comments\DB\Comment;

class CommentsController extends BaseController {

	public function index() {
		$comments = Comment::orderBy('created_at', 'desc')
		->paginate(20);

		$this->layout->title = 'Comments';
		$this->layout->content = \View::make('comments::admin.index', compact('comments'));
	}

	public function show($id) {
		$comment = Comment::findOrFail($id);
		$comment->readed_at = Carbon::now();
		$comment->save();

		$this->layout->title = 'Comment';
		$this->layout->content = \View::make('comments::admin.show', compact('comment'));
	}

	public function destroy($id) {
		$comment = Comment::findOrFail($id);
		$comment->delete();

		return \Redirect::route('admin.comments.index');
	}

	public function exportAll() {
		Comment::whereNull('readed_at')
		->update(array('readed_at' => Carbon::now()));

		$comments = Comment::all()->toArray();

		\Excel::create('comments', function($excel) use ($comments) {
			$excel->sheet('Comments', function($sheet) use ($comments) {
				$sheet->fromArray($comments);
			});
		})->download('xlsx');

		return \Redirect::route('admin.comments.index');
	}

	public function exportNonreaded() {
		$query = Comment::whereNull('readed_at');
		$comments = $query->get()->toArray();

		$query->update(array('readed_at' => Carbon::now()));
		
		\Excel::create('comments', function($excel) use ($comments) {
			$excel->sheet('Comments', function($sheet) use ($comments) {
				$sheet->fromArray($comments);
			});
		})->download('xlsx');

		return \Redirect::route('admin.comments.index');
	}

}
